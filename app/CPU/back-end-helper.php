<?php

namespace App\CPU;

use App\Model\Cart;
use App\Model\Order;
use App\Model\Currency;
use App\CPU\CartManager;
use App\CPU\OrderManager;
use App\Model\BusinessSetting;
use App\Model\ShippingAddress;
use Illuminate\Support\Carbon;
use App\Model\OrderTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class BackEndHelper
{
    public static function currency_to_usd($amount)
    {
        $currency_model = Helpers::get_business_settings('currency_model');
        if ($currency_model == 'multi_currency') {
            $default = Currency::find(BusinessSetting::where(['type' => 'system_default_currency'])->first()->value);
            $usd = Currency::where('code', 'USD')->first()->exchange_rate;
            $rate = $default['exchange_rate'] / $usd;
            $value = floatval($amount) / floatval($rate);
        } else {
            $value = floatval($amount);
        }

        return $value;
    }

    public static function usd_to_currency($amount)
    {
        $currency_model = Helpers::get_business_settings('currency_model');
        if ($currency_model == 'multi_currency') {

            if (session()->has('default')) {
                $default = session('default');
            } else {
                $default = Currency::find(Helpers::get_business_settings('system_default_currency'))->exchange_rate;
                session()->put('default', $default);
            }

            if (session()->has('usd')) {
                $usd = session('usd');
            } else {
                $usd = Currency::where('code', 'USD')->first()->exchange_rate;
                session()->put('usd', $usd);
            }

            $rate = $default / $usd;
            $value = floatval($amount) * floatval($rate);
        } else {
            $value = floatval($amount);
        }

        return round($value, 2);
    }

    public static function currency_symbol()
    {
        $currency = Currency::where('id', Helpers::get_business_settings('system_default_currency'))->first();
        return $currency->symbol;
    }

    public static function set_symbol($amount)
    {
        $decimal_point_settings = Helpers::get_business_settings('decimal_point_settings');
        $position = Helpers::get_business_settings('currency_symbol_position');
        if (!is_null($position) && $position == 'left') {
            $string = currency_symbol() . '' . number_format($amount, (!empty($decimal_point_settings) ? $decimal_point_settings: 0));
        } else {
            $string = number_format($amount, !empty($decimal_point_settings) ? $decimal_point_settings: 0) . '' . currency_symbol();
        }
        return $string;
    }

    public static function currency_code()
    {
        $currency = Currency::where('id', Helpers::get_business_settings('system_default_currency'))->first();
        return $currency->code;
    }

    public static function max_earning()
    {

        $from = \Carbon\Carbon::now()->startOfYear()->format('Y-m-d');
        $to = Carbon::now()->endOfYear()->format('Y-m-d');

        $data = Order::where([
            'seller_is' => 'admin',
            'order_status'=>'delivered'
        ])->select(
            DB::raw('IFNULL(sum(order_amount),0) as sums'),
            DB::raw('YEAR(created_at) year, MONTH(created_at) month')
        )->whereBetween('created_at', [$from, $to])->groupby('year', 'month')->get()->toArray();

        $max = 0;
        foreach ($data as $month) {
            $count = 0;
            foreach ($month as $order) {
                $count += $order['order_amount'];
            }
            if ($count > $max) {
                $max = $count;
            }
        }

        return $max;
    }

    public static function max_orders()
    {
        $from = \Carbon\Carbon::now()->startOfYear()->format('Y-m-d');
        $to = Carbon::now()->endOfYear()->format('Y-m-d');

        $data = Order::where([
            'order_type'=>'default_type'
        ])->select(
            DB::raw('COUNT(id) as count'),
            DB::raw('YEAR(created_at) year, MONTH(created_at) month')
        )->whereBetween('created_at', [$from, $to])->groupby('year', 'month')->get()->toArray();

        $max = 0;
        foreach ($data as $item) {
            if ($item['count'] > $max) {
                $max = $item['count'];
            }
        }

        return $max;
    }

    public static function order_status($status){
        switch ($status) {
            case "pending":
                return "Pending";
            case "confirmed":
                return "Confirmed";
            case "processing":
                return "Packaging";
            case "out_for_delivery":
                return "Out for Delivery";
            case "delivered":
                return "Delivered";
            case "returned":
                return "Returned";
            case "failed":
                return "Failed to Deliver";
            case "canceled":
                return "Canceled";
        }
    }

    public static function format_currency($value){
        $suffixes = ["1t+" => 1000000000000, "B+" => 1000000000, "M+" => 1000000, "K+" => 1000];
        foreach ($suffixes as $suffix => $factor) {
            if ($value >= $factor) {
                $div = $value / $factor;
                $formatted_value = number_format($div,1 ) . $suffix;
                break;
            }
        }

        if (!isset($formatted_value)) {
            $formatted_value = number_format($value, 2);
        }

        return $formatted_value;
    }

    public function afterShip()
    {
        $unique_id = OrderManager::gen_unique_id();
        $order_ids = [];
        $cart_group_ids = CartManager::get_cart_group_ids();
        $carts = Cart::whereIn('cart_group_id', $cart_group_ids)->get();

        $physical_product = false;
        foreach($carts as $cart){
            if($cart->product_type == 'physical'){
                $physical_product = true;
            }
        }
        if($physical_product) {
            foreach ($cart_group_ids as $group_id) {
                $data = [
                    'payment_method' => 'cash_on_delivery',
                    'order_status' => 'pending',
                    'payment_status' => 'unpaid',
                    'transaction_ref' => '',
                    'order_group_id' => $unique_id,
                    'cart_group_id' => $group_id
                ];
                $order_id = OrderManager::generate_order($data);
                array_push($order_ids, $order_id);
            }
            $shippingAddress = ShippingAddress::find(session('address_id'));
            //Shipping Api
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'as-api-key' => 'asat_1812d8cb63514d82ab903b1b8499bf30',
            ])->post('https://sandbox-api.aftership.com/postmen/v3/labels', [
                "return_shipment" => false,
                "is_document" => true,
                "service_type" => $cart->shipping_type,
                "paper_size" => "4x6",
                "shipper_account" => [
                    "id" => "3ba41ff5-59a7-4ff0-8333-64a4375c7f21"
                ],
                "references" => [
                    strval($order_id)
                ],
                "billing" => [
                    "paid_by" => "recipient",

                ],
                "shipment" => [
                    "ship_from" => [
                        "contact_name" => $cart->seller->f_name.' '.$cart->seller->l_name,
                        "company_name" => $cart->shop->name,
                        "country" => $cart->shop->country,
                        "state" => $cart->shop->state,
                        "city" => $cart->shop->city,
                        "street1" => $cart->shop->street,
                        "postal_code" => $cart->shop->postal_code,
                        "phone" => $cart->seller->phone,
                        "email" => $cart->seller->email
                    ],
                    "ship_to" => [
                        "contact_name" => $shippingAddress->contact_person_name,
                        "company_name" => "Customer",
                        "street1" => $shippingAddress->address,
                        "city" => $shippingAddress->city,
                        "state" => "UT",
                        "postal_code" => $shippingAddress->zip,
                        "country" => $shippingAddress->country,
                        "phone" => $shippingAddress->phone,
                        "email" => auth('customer')->user()->email
                    ],
                    "parcels" => [
                        [
                            "box_type" => "custom",
                            "dimension" => [
                                "width" => $cart->product->width,
                                "height" => $cart->product->height,
                                "depth" => $cart->product->depth,
                                "unit" => $cart->product->dimention_unit
                            ],
                            "items" => [
                                [
                                    "description" => strip_tags($cart->product->details),
                                    "quantity" => $cart->quantity,
                                    "price" => [
                                        "currency" => session('currency_code'),
                                        "amount" => $cart->price
                                    ],
                                    "item_id" => "1234567",
                                    "origin_country" => "CHN",
                                    "weight" => [
                                        "unit" => $cart->product->weight_unit,
                                        "value" => $cart->product->weight
                                    ],
                                    "sku" => json_decode($cart->product->variation)[0]->sku ?? 'none',
                                    "hs_code" => $cart->product->hs_code
                                ]
                            ],
                            "description" => "Remise Order",
                            "weight" => [
                                "unit" => $cart->product->weight_unit,
                                "value" => $cart->product->weight
                            ]
                        ]
                    ],
                    'delivery_instructions' => session('order_note')
                ]
            ]);

            $response = $response->json();
            // dd($response);
            //Shipping Api
        }
        return 'success';
    }
}
