@extends('layouts.front-end.app')

@section('title', $product['name'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://icons.getbootstrap.com/">

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    @section('content')
        <?php
        $overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews);
        $rating = \App\CPU\ProductManager::get_rating($product->reviews);
        $decimal_point_settings = \App\CPU\Helpers::get_business_settings('decimal_point_settings');
        ?>
        <div class="container-fluid breadcrumbs">
            {{-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Categories</a></li>
                <li class="breadcrumb-item"><a href="#">Product 1</a></li>
                <li class="breadcrumb-item"><a href="#">Product Name</a></li>
                <li class="breadcrumb-item active" aria-current="page">Full Name</li>
            </ol>
        </nav> --}}
        </div>

        <div class="container-fluid">
            <hr class="m-5">
        </div>

        <div class="container-fluid my-3 prod-det">
            <div class="row my-2">
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="cz-product-gallery flex-column">
                        <div class="cz-preview">
                            @if ($product->images != null && json_decode($product->images) > 0)
                                @if (json_decode($product->colors) && $product->color_image)
                                    @foreach (json_decode($product->color_image) as $key => $photo)
                                        @if ($photo->color != null)
                                            <div class="cz-preview-item d-flex align-items-center justify-content-center {{ $key == 0 ? 'active' : '' }}"
                                                id="image{{ $photo->color }}">
                                                <img class="cz-image-zoom img-responsive w-100 __max-h-323px"
                                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                    src="{{ asset("storage/app/public/product/$photo->image_name") }}"
                                                    data-zoom="{{ asset("storage/app/public/product/$photo->image_name") }}"
                                                    alt="Product image" width="">
                                                <div class="cz-image-zoom-pane"></div>
                                            </div>
                                        @else
                                            <div class="cz-preview-item d-flex align-items-center justify-content-center {{ $key == 0 ? 'active' : '' }}"
                                                id="image{{ $key }}">
                                                <img class="cz-image-zoom img-responsive w-100 __max-h-323px"
                                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                    src="{{ asset("storage/app/public/product/$photo->image_name") }}"
                                                    data-zoom="{{ asset("storage/app/public/product/$photo->image_name") }}"
                                                    alt="Product image" width="">
                                                <div class="cz-image-zoom-pane"></div>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach (json_decode($product->images) as $key => $photo)
                                        <div class="cz-preview-item d-flex align-items-center justify-content-center {{ $key == 0 ? 'active' : '' }}"
                                            id="image{{ $key }}">
                                            <img class="cz-image-zoom img-responsive w-100 __max-h-323px"
                                                onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                src="{{ asset("storage/app/public/product/$photo") }}"
                                                data-zoom="{{ asset("storage/app/public/product/$photo") }}"
                                                alt="Product image" width="">
                                            <div class="cz-image-zoom-pane"></div>
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                        </div>
                        <div class="cz">
                            <div class="table-responsive __max-h-515px" data-simplebar>
                                <div class="d-flex">
                                    @if ($product->images != null && json_decode($product->images) > 0)
                                        @if (json_decode($product->colors) && $product->color_image)
                                            @foreach (json_decode($product->color_image) as $key => $photo)
                                                @if ($photo->color != null)
                                                    <div class="cz-thumblist">
                                                        <a class="cz-thumblist-item  {{ $key == 0 ? 'active' : '' }} d-flex align-items-center justify-content-center"
                                                            id="preview-img{{ $photo->color }}"
                                                            href="#image{{ $photo->color }}">
                                                            <img onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                                src="{{ asset("storage/app/public/product/$photo->image_name") }}"
                                                                alt="Product thumb">
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="cz-thumblist">
                                                        <a class="cz-thumblist-item  {{ $key == 0 ? 'active' : '' }} d-flex align-items-center justify-content-center"
                                                            id="preview-img{{ $key }}"
                                                            href="#image{{ $key }}">
                                                            <img onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                                src="{{ asset("storage/app/public/product/$photo->image_name") }}"
                                                                alt="Product thumb">
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach (json_decode($product->images) as $key => $photo)
                                                <div class="cz-thumblist">
                                                    <a class="cz-thumblist-item  {{ $key == 0 ? 'active' : '' }} d-flex align-items-center justify-content-center"
                                                        id="preview-img{{ $key }}"
                                                        href="#image{{ $key }}">
                                                        <img onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                            src="{{ asset("storage/app/public/product/$photo") }}"
                                                            alt="Product thumb">
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 description p-5">
                    <h2 class="h2-heading">
                        {{ $product->name }}
                    </h2>
                    <div class="d-flex flex-wrap align-items-center mb-2 pro">
                        {{-- <span
                            class="d-inline-block  align-middle mt-1 {{ Session::get('direction') === 'rtl' ? 'ml-md-2 ml-sm-0 pl-2' : 'mr-md-2 mr-sm-0 pr-2' }} __color-FE961C"
                            style="font-size: 20px;">{{ $overallRating[0] }}</span> --}}
                        <span
                            class="d-inline-block  align-middle mt-1 {{ Session::get('direction') === 'rtl' ? 'ml-md-2 ml-sm-0 pl-2' : 'mr-md-2 mr-sm-0 pr-2' }} __color-FE961C"
                            style="font-size: 20px;">{{ number_format($avgRating,1) }}</span>
                        <div class="star-rating">
                            {{-- @for ($inc = 0; $inc < 5; $inc++)
                                @if ($inc < $overallRating[0])
                                    <i class="sr-star czi-star-filled active" style="font-size:20px; "></i>
                                @else
                                    <i class="sr-star czi-star" style="font-size:20px; "></i>
                                @endif
                            @endfor --}}
                            @php
                                 $floatNumber = true;
                            @endphp
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $avgRating)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffc700" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                    </svg>
                                    @elseif(strpos($avgRating,'.5') !== false && $floatNumber)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <defs>
                                        <linearGradient id="grad">
                                            <stop offset="50%" stop-color="#ffc700"/>
                                            <stop offset="50%" stop-color="#1E1E1E33"/>
                                        </linearGradient>
                                        </defs>
                                        <path fill="url(#grad)" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    @php $floatNumber = false; @endphp
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1E1E1E33" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                @endif
                            @endfor
                        </div>
                        <span
                            class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 {{ Session::get('direction') === 'rtl' ? 'mr-1 ml-md-2 ml-1 pr-md-2 pr-sm-1 pl-md-2 pl-sm-1' : 'ml-1 mr-md-2 mr-1 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1' }}"
                            style="font-size:11px !important;">{{ $reviews->count() }}
                            {{ \App\CPU\translate('Reviews') }}</span>
                        <span class="__inline-25"></span>
                        <span
                            class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 {{ Session::get('direction') === 'rtl' ? 'mr-1 ml-md-2 ml-1 pr-md-2 pr-sm-1 pl-md-2 pl-sm-1' : 'ml-1 mr-md-2 mr-1 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1' }}"
                            style="font-size:11px !important;">{{ $countOrder }} {{ \App\CPU\translate('orders') }}
                        </span>
                        {{-- <span class="__inline-25"> </span>
                        <span
                            class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 {{ Session::get('direction') === 'rtl' ? 'mr-1 ml-md-2 ml-0 pr-md-2 pr-sm-1 pl-md-2 pl-sm-1' : 'ml-1 mr-md-2 mr-0 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1' }} text-capitalize"
                            style="font-size:11px !important;"> {{ $countWishlist }}
                            {{ \App\CPU\translate('wish_listed') }} </span> --}}

                    </div>
                    {{-- <div class="float-left sold">
                    <p class="px-2 py-1 m-0">
                        Sold 120
                    </p>
                </div> --}}

                    <div class="product-inner" style="clear: both;">
                        <p class="sold-by"> Sold By </p>
                        <h3 class="title h3-heading" style="text-transform: capitalize;">
                            @if ($product->added_by == 'seller')
                                {{ $product->seller->shop ? $product->seller->shop->name : $product->seller->f_name }}
                            @elseif($product->added_by == 'admin')
                                {{ $web_config['name']->value }}
                            @endif
                        </h3>
                        <img src="{{ asset('public/assets/Images/Badge.png') }}" class="pt-1 pl-2">
                        <img src="{{ asset('public/assets/Images/Message-icon.png') }}" style="float: right;">
                        <i class="fa-sharp fa-solid fa-messages-question" style="color: #ff061e;"></i>

                    </div>


                    <div class="price" style="padding-top: 30px;padding-bottom: 30px;">
                        <p
                            style="font-family: 'BURBANKBIGCONDENSED-BOLD' !important;
                        margin-bottom:0px;
                        ">

                        {{ \App\CPU\Helpers::currency_converter($product->unit_price - \App\CPU\Helpers::get_product_discount($product, $product->unit_price)) }}
                        </p>
                        @if ($product->discount > 0)
                        <p class="discount">
                            Was <span
                                style="
                        font-family: 'BURBANKBIGCONDENSED-BOLD' !important;
                        color:#1E1E1E99;
                        font-size:14px;
                        text-decoration: line-through;
                        text-decoration-color:#000;
                        ">{{ \App\CPU\Helpers::currency_converter($product->unit_price) }}</span>
                        </p>
                        @endif
                    </div>
                    <div class="size">
                        <h2 class="h2-heading">
                            Size
                        </h2>
                        <button src="#" class="px-4 py-1 m-0 mx-2"> S </button>
                        <button src="#" class="px-4 py-1 m-0 mx-2"> M </button>
                        <button src="#" class="px-4 py-1 m-0 mx-2"> L </button>
                        <button src="#" class="px-4 py-1 m-0 mx-2"> XL </button>
                    </div>
                    <div class="product-about pt-4" style="clear: both;">
                        <h2 class="h2-heading">
                            About this Item
                        </h2>
                        <p class="desrptn">Details
                            {!! $product['details'] !!}
                        </p>


                    </div>
                </div>
                <div class="col-lg-3 cart p-5 border-left-cart">
                    <div class="col-lg ">
                        <h3 class="delivery h3-heading"> Delivery </h3>
                        <div class="location-select">
                            <i class="fa-solid fa-location-dot"></i>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>85256 Jacobi Green</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <h3 class="h3-heading">
                            Total Stock: {{ $product->current_stock }}
                        </h3>
                        <div class="wrapper Plus-Minus">
                            <span class="minus">-</span>
                            <span class="num">01</span>
                            <span class="plus">+</span>
                        </div>
                        <script>
                            const plus = document.querySelector(".plus"),
                                minus = document.querySelector(".minus"),
                                num = document.querySelector(".num");
                            let a = 1;
                            plus.addEventListener("click", () => {
                                a++;
                                //a = (a < 10) ? "0" + a : a;
                                num.innerText = a;
                                document.getElementById('qtyProduct').setAttribute("value", a);
                                checkQTY();
                            });

                            minus.addEventListener("click", () => {
                                if (a > 1) {
                                    a--;
                                    //a = (a < 10) ? "0" + a : a;
                                    num.innerText = a;
                                    document.getElementById('qtyProduct').value = a;
                                }
                            });
                        </script>
                        <div class="row price-shipping">
                            <div class="col-6">
                                <p style="color: #1E1E1E80;
                            ">Price

                                </p>
                            </div>
                            <div class="col-6" style="text-align: end;">
                                <p> <b>{{ \App\CPU\Helpers::get_price_range($product) }}</b> </p>
                            </div>
                        </div>
                        <div class="row price-shipping pb-4">
                            <div class="col-6">
                                <p style="color: #1E1E1E80;
                            ">Shipping</p>
                            </div>
                            <div class="col-6" style="text-align: end;">
                                <p> <b>${{ $product->shipping_cost }}</b> </p>
                            </div>
                        </div>
                        <form id="add-to-cart-form" class="mb-2">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <div
                                class="position-relative {{ Session::get('direction') === 'rtl' ? 'ml-n4' : 'mr-n4' }} mb-2">
                                @if (count(json_decode($product->colors)) > 0)
                                    <div class="flex-start">
                                        <div class="product-description-label mt-2 text-body"
                                            style="color: #1E1E1E80 !important;">{{ \App\CPU\translate('color') }}:
                                        </div>
                                        <div>
                                            <ul class="list-inline checkbox-color mb-1 flex-start {{ Session::get('direction') === 'rtl' ? 'mr-2' : 'ml-2' }}"
                                                style="padding-{{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 0;">
                                                @foreach (json_decode($product->colors) as $key => $color)
                                                    <div>
                                                        <li>
                                                            <input type="radio"
                                                                id="{{ $product->id }}-color-{{ str_replace('#', '', $color) }}"
                                                                name="color" value="{{ $color }}"
                                                                @if ($key == 0) checked @endif>
                                                            <label style="background: {{ $color }};"
                                                                for="{{ $product->id }}-color-{{ str_replace('#', '', $color) }}"
                                                                data-toggle="tooltip"
                                                                onclick="focus_preview_image_by_color('{{ str_replace('#', '', $color) }}')">
                                                                <span class="outline"></span></label>
                                                        </li>
                                                    </div>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                @php
                                    $qty = 0;
                                    if (!empty($product->variation)) {
                                        foreach (json_decode($product->variation) as $key => $variation) {
                                            $qty += $variation->qty;
                                        }
                                    }
                                @endphp
                            </div>
                            <input type="text" name="quantity" id="qtyProduct" style="display:none;"
                                class="form-control input-number text-center cart-qty-field __inline-29" placeholder="1"
                                value="{{ $product->minimum_order_qty ?? 1 }}"
                                product-type="{{ $product->product_type }}" min="{{ $product->minimum_order_qty ?? 1 }}"
                                max="100">
                            @foreach (json_decode($product->choice_options) as $key => $choice)
                                <div class="row flex-start mx-0">
                                    <div class="product-description-label text-body mt-2 {{ Session::get('direction') === 'rtl' ? 'pl-2' : 'pr-2' }}"
                                        style="font-size:20px; font-weight:600">{{ $choice->title }}
                                    </div>
                                    <div>
                                        <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2 mx-1 flex-start row"
                                            style="padding-{{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 0;">
                                            @foreach ($choice->options as $key => $option)
                                                <div>
                                                    <li class="for-mobile-capacity">

                                                        <input type="radio"
                                                            id="{{ $choice->name }}-{{ $option }}"
                                                            name="{{ $choice->name }}" value="{{ $option }}"
                                                            @if ($key == 0) checked @endif>
                                                        <label class="__text-12px"
                                                            for="{{ $choice->name }}-{{ $option }}">{{ $option }}</label>
                                                    </li>
                                                </div>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Quantity + Add to cart -->
                            {{-- <div class="mt-2">
                            <div class="product-quantity d-flex flex-wrap align-items-center __gap-15">
                                <div class="d-flex align-items-center">
                                    <div class="product-description-label text-body mt-2">{{\App\CPU\translate('Quantity')}}:</div>
                                    <div
                                        class="d-flex justify-content-center align-items-center __w-160px"
                                        style="color: {{$web_config['primary_color']}}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-number __p-10" type="button"
                                                    data-type="minus" data-field="quantity"
                                                    disabled="disabled" style="color: {{$web_config['primary_color']}}">
                                                -
                                            </button>
                                        </span>
                                        <input type="text" name="quantity"
                                            class="form-control input-number text-center cart-qty-field __inline-29"
                                            placeholder="1" value="{{ $product->minimum_order_qty ?? 1 }}" product-type="{{ $product->product_type }}" min="{{ $product->minimum_order_qty ?? 1 }}" max="100">
                                        <span class="input-group-btn">
                                            <button class="btn btn-number __p-10" type="button" product-type="{{ $product->product_type }}" data-type="plus"
                                                    data-field="quantity" style="color: {{$web_config['primary_color']}}">
                                            +
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div id="chosen_price_div">
                                    <div class="d-flex justify-content-center align-items-center {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}">
                                        <div class="product-description-label"><strong>{{\App\CPU\translate('total_price')}}</strong> : </div>
                                        &nbsp; <strong id="chosen_price"></strong>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                            <div class="row no-gutters d-none mt-2 flex-start d-flex">
                                <div class="col-12">
                                    @if ($product['product_type'] == 'physical' && $product['current_stock'] <= 0)
                                        <h5 class="mt-3 text-danger">{{ \App\CPU\translate('out_of_stock') }}</h5>
                                    @endif
                                </div>
                            </div>

                            <div class="__btn-grp mt-2 mb-3">
                                @if (
                                    ($product->added_by == 'seller' &&
                                        ($seller_temporary_close ||
                                            (isset($product->seller->shop) &&
                                                $product->seller->shop->vacation_status &&
                                                $current_date >= $seller_vacation_start_date &&
                                                $current_date <= $seller_vacation_end_date))) ||
                                        ($product->added_by == 'admin' &&
                                            ($inhouse_temporary_close ||
                                                ($inhouse_vacation_status &&
                                                    $current_date >= $inhouse_vacation_start_date &&
                                                    $current_date <= $inhouse_vacation_end_date))))
                                    <button class="btn btn-secondary" type="button" disabled>
                                        {{ \App\CPU\translate('buy_now') }}
                                    </button>
                                    <button class="btn cart-btn " type="button" disabled>
                                        {{ \App\CPU\translate('add_to_cart') }}
                                    </button>
                                @else
                                    <button
                                        class="btn buy-btn element-center __iniline-26 btn-gap-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}"
                                        onclick="buy_now()" type="button">
                                        <span class="">{{ \App\CPU\translate('buy_now') }}</span>
                                    </button>
                                    <button
                                        class="btn cart-btn element-center btn-gap-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}"
                                        onclick="addToCart()" type="button">
                                        <span class="">{{ \App\CPU\translate('add_to_cart') }}</span>
                                    </button>
                                @endif
                                {{-- <button type="button" onclick="addWishlist('{{$product['id']}}')"
                                    class="btn __text-18px text-danger">
                                <i class="fa fa-heart-o "
                                aria-hidden="true"></i>
                                <span class="countWishlist-{{$product['id']}}">{{$countWishlist}}</span>
                            </button> --}}
                                @if (
                                    ($product->added_by == 'seller' &&
                                        ($seller_temporary_close ||
                                            (isset($product->seller->shop) &&
                                                $product->seller->shop->vacation_status &&
                                                $current_date >= $seller_vacation_start_date &&
                                                $current_date <= $seller_vacation_end_date))) ||
                                        ($product->added_by == 'admin' &&
                                            ($inhouse_temporary_close ||
                                                ($inhouse_vacation_status &&
                                                    $current_date >= $inhouse_vacation_start_date &&
                                                    $current_date <= $inhouse_vacation_end_date))))
                                    <div class="alert alert-danger" role="alert">
                                        {{ \App\CPU\translate('this_shop_is_temporary_closed_or_on_vacation._You_cannot_add_product_to_cart_from_this_shop_for_now') }}
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid reviews">
            <h2 class="h2-heading">Ratings & Reviews</h2>
            <div class="row">
                <div class="col-sm-3">
                    <div class="rating-block">

                        <h2 class="bold padding-bottom-7 h2-heading">{{ number_format($avgRating,1) }}<small>/5.0</small></h2>
                        @php
                            $floatNumber = true;
                        @endphp
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $avgRating)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#ffc700"
                                        class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                            @elseif(strpos($avgRating,'.5') !== false && $floatNumber)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <defs>
                                        <linearGradient id="grad">
                                            <stop offset="50%" stop-color="#ffc700"/>
                                            <stop offset="50%" stop-color="#1E1E1E33"/>
                                        </linearGradient>
                                        </defs>
                                        <path fill="url(#grad)" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    @php $floatNumber = false; @endphp
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#1E1E1E33"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            @endif
                        @endfor
                    </div>
                    <h5>
                        {{ $reviews->count() }} Rating
                    </h5>
                </div>
                <div class="col-sm-5">
                    <div class="float-left">
                        <div class="float-left" style="width:100px; line-height:1;">
                            <div style="margin:5px 0;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffc700"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffc700"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffc700"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffc700"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffc700"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>

                            </div>
                        </div>
                        <div class="float-left" style="width:180px;">
                            <div class="float-left" style="width:180px;">
                                @php
                                    $reviewsCount = $reviews->where('rating',5)->count();
                                    $progressBar = ($reviewsCount / $reviews->count()) * 100;
                                @endphp
                                <div class="progress" style="height:9px; margin:8px 0;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="5" aria-valuemin="0"
                                        aria-valuemax="5" style="width: {{ $progressBar }}%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-right" style="margin-left:10px;">
                            {{ $reviewsCount }}
                        </div>
                    </div>
                    <div class="float-left">
                        <div class="float-left" style="width:100px; line-height:1;">
                            <div style="margin:5px 0;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffc700"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffc700"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffc700"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffc700"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1E1E1E33"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                {{-- <i class="fa-solid fa-star float-left" style="color: #ffc700;"></i>
                            <i class="fa-solid fa-star float-left" style="color: #ffc700;"></i>
                            <i class="fa-solid fa-star float-left" style="color: #ffc700;"></i>
                            <i class="fa-solid fa-star float-left" style="color: #ffc700;"></i>
                            <i class="fa-solid fa-star float-left" style="color: #1E1E1E33;"></i> --}}

                            </div>
                        </div>
                        <div class="float-left" style="width:180px;">
                            <div class="float-left" style="width:180px;">
                                @php
                                    $reviewsCount = $reviews->where('rating',4)->count();
                                    $progressBar = ($reviewsCount / $reviews->count()) * 100;
                                @endphp
                                <div class="progress" style="height:9px; margin:8px 0;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="5" aria-valuemin="0"
                                        aria-valuemax="5" style="width: {{ $progressBar }}%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-right" style="margin-left:10px;">
                            {{ $reviewsCount }}
                        </div>
                    </div>
                    <div class="float-left">
                        <div class="float-left" style="width:100px; line-height:1;">
                            <div style="margin:5px 0;">


                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffc700"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffc700"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffc700"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1E1E1E33"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1E1E1E33"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>


                                {{-- <i class="fa-solid fa-star float-left" style="color: #ffc700;"></i>
                            <i class="fa-solid fa-star float-left" style="color: #ffc700;"></i>
                            <i class="fa-solid fa-star float-left" style="color: #ffc700;"></i>
                            <i class="fa-solid fa-star float-left" style="color: #1E1E1E33;"></i>
                            <i class="fa-solid fa-star float-left" style="color: #1E1E1E33;"></i> --}}

                            </div>
                        </div>
                        <div class="float-left" style="width:180px;">
                            @php
                                $reviewsCount = $reviews->where('rating',3)->count();
                                $progressBar = ($reviewsCount / $reviews->count()) * 100;
                            @endphp
                            <div class="progress" style="height:9px; margin:8px 0;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="5" aria-valuemin="0"
                                    aria-valuemax="5" style="width: {{ $progressBar }}%">
                                </div>
                            </div>
                        </div>
                        <div class="float-right" style="margin-left:10px;">
                            {{ $reviewsCount }}
                        </div>
                    </div>
                    <div class="float-left">
                        <div class="float-left" style="width:100px; line-height:1;">
                            <div style="margin:5px 0;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffc700"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffc700"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1E1E1E33"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1E1E1E33"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1E1E1E33"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>


                                {{-- <i class="fa-solid fa-star float-left" style="color: #ffc700;"></i>
                            <i class="fa-solid fa-star float-left" style="color: #ffc700;"></i>
                            <i class="fa-solid fa-star float-left" style="color: #1E1E1E33;"></i>
                            <i class="fa-solid fa-star float-left" style="color: #1E1E1E33;"></i>
                            <i class="fa-solid fa-star float-left" style="color: #1E1E1E33;"></i> --}}

                            </div>
                        </div>
                        <div class="float-left" style="width:180px;">
                            <div class="float-left" style="width:180px;">
                                @php
                                    $reviewsCount = $reviews->where('rating',2)->count();
                                    $progressBar = ($reviewsCount / $reviews->count()) * 100;
                                @endphp
                                <div class="progress" style="height:9px; margin:8px 0;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="5" aria-valuemin="0"
                                        aria-valuemax="5" style="width: {{ $progressBar }}%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-right" style="margin-left:10px;">
                            {{ $reviewsCount }}
                        </div>
                    </div>
                    <div class="float-left">
                        <div class="float-left" style="width:100px; line-height:1;">
                            <div style="margin:5px 0;">


                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffc700"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1E1E1E33"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1E1E1E33"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1E1E1E33"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1E1E1E33"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>


                                {{-- <i class="fa-solid fa-star float-left" style="color: #ffc700;"></i>
                            <i class="fa-solid fa-star float-left" style="color: #1E1E1E33;"></i>
                            <i class="fa-solid fa-star float-left" style="color: #1E1E1E33;"></i>
                            <i class="fa-solid fa-star float-left" style="color: #1E1E1E33;"></i>
                            <i class="fa-solid fa-star float-left" style="color: #1E1E1E33;"></i> --}}

                            </div>
                        </div>
                        <div class="float-left" style="width:180px;">
                            <div class="float-left" style="width:180px;">
                                @php
                                    $reviewsCount = $reviews->where('rating',1)->count();
                                    $progressBar = ($reviewsCount / $reviews->count()) * 100;
                                @endphp
                                <div class="progress" style="height:9px; margin:8px 0;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="5" aria-valuemin="0"
                                        aria-valuemax="5" style="width: {{ $progressBar }}%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-right" style="margin-left:10px;">
                            {{ $reviewsCount }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-filters">
                <div class="col-lg-8 col-sm-6 product-review-bot">
                    <h3 class="h3-heading">Product Reviews</h3>
                </div>
                <div class="col-lg-4 col-sm-6 sort-by p-0">
                    <form id="filter-form" action="{{ route('product',request()->slug) }}" method="GET">
                        <div class="rightSort">
                            <div class="sortBy">
                                <label for="cars">Sort by:</label>
                                <select name="filter" id="filter">
                                    <option value="best" {{ request()->filter == 'best' ? 'selected' : '' }}>Best</option>
                                    <option value="latest" {{ request()->filter == 'latest' ? 'selected' : '' }}>Latest</option>
                                    <option value="average" {{ request()->filter == 'average' ? 'selected' : '' }}>Average</option>
                                    <option value="" {{ request()->filter == '' ? 'selected' : '' }}>No preferences</option>
                                </select>
                            </div>
                            {{-- <div class="viewBy">
                                <p>View:</p>
                                <img src="{{ asset('public/assets/Images/Grid-icon.png') }}">
                                <img class="pl-4" src="{{ asset('public/assets/Images/nav-icon.png') }}">
                            </div> --}}
                        </div>
                    </form>
                </div>

            </div>

            @foreach ($filterReviews as $review)
            <div class="row">
                <div class="col-sm-12">
                    <hr />
                    <div class="review-block">
                        <div class="row">
                            <div class="col-sm-10">
                                <img src="{{ asset('storage/app/public/profile/'.$review->customer->image) }}" class="img-rounded" height="50px" width="50px">
                                <div class="review-block-name"><a href="#">{{ $review->customer->f_name .' '. $review->customer->l_name }}</a></div>
                                <div class="review-block-rate">
                                    @for($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffc700"
                                            class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1E1E1E33" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                        </svg>
                                    @endif
                                    @endfor
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <p style="float: right;">
                                    {{ $review->created_at->format('d M Y') }}
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <div class="review-block-description">{{ $review->comment }}</div>
                                <div class="rev-img">
                                    @php
                                        $imageArray = json_decode($review->attachment);
                                    @endphp
                                    @foreach ($imageArray as $attachment)
                                        <img src="{{ asset('storage/app/public/review/'.$attachment) }}" alt="review img">
                                    @endforeach
                                </div>
                                {{-- <div class="rev-like">
                                    <i class="fa fa-thumbs-up" aria-hidden="true"> 08</i>
                                </div> --}}
                            </div>
                        </div>
                        <hr />
                    </div>
                </div>
            </div>
            @endforeach


        </div>

    @endsection
</body>

</html>

<style>
    @font-face {
        font-family: 'BURBANKBIGCONDENSED-BOLD';
        src: url({{ asset('public/assets/front-end/fonts/BURBANKBIGCONDENSED-BOLD.ttf') }});

    }

    @font-face {
        font-family: 'BURBANKBIGCONDENSED-BLACK';
        src: url({{ asset('public/assets/front-end/fonts/BURBANKBIGCONDENSED-BLACK.ttf') }});

    }

    .container-fluid {
        padding: 0px 60px !important;
    }

    .h2-heading {
        font-family: 'BURBANKBIGCONDENSED-BOLD' !important;
        font-size: 33.23px;
        color: #1E1E1E !important;
        font-weight: 600 !important;
        line-height: 33px !important;
        letter-spacing: 0em !important;
        text-align: left !important;
        margin-top: 0px !important;
    }

    .h3-heading {
        font-family: 'BURBANKBIGCONDENSED-BOLD' !important;

        color: #1E1E1E !important;
        /* font-family: Burbank Big Condensed !important; */
        font-size: 26px;
        font-weight: 600 !important;
        line-height: 26px !important;
        letter-spacing: 0em !important;
        text-align: left !important;
        margin: 0px 0px 15px 0px !important;
    }

    .h4-heading {
        color: #1E1E1E;
        font-family: Poppins;
        font-size: 15px;
        font-weight: 500;
        line-height: 22px;
        letter-spacing: 0em;
        text-align: left;

    }


    .breadcrumbs .breadcrumb {
        background-color: transparent;
        padding: 25px 0px;
    }

    .breadcrumb-item+.breadcrumb-item::before {
        content: ">" !important;
    }

    .breadcrumbs .breadcrumb-item {
        color: #BC0012;
        font-family: Poppins;
        font-size: 12px;
        font-weight: 500;
        line-height: 18px;
        letter-spacing: 0em;
        text-align: left;

    }

    .breadcrumbs .breadcrumb-item a {
        color: #FF061E !important;
    }

    .breadcrumbs .breadcrumb-item a:active {
        color: #1E1E1E !important;
        text-decoration: none !important;
    }

    .breadcrumbs .breadcrumb-item a:hover {
        color: #BC0012 !important;
        text-decoration: none !important;
    }


    .divider {
        border-top: 1px solid #1e1e1e80;
        padding: 0px 0px 15px 0px;
    }

    .ft-img {
        background-color: #cccccc !important;
        background: linear-gradient(90deg, #5c5c5c, transparent);
        width: 100%;
        border-radius: 20px;
    }

    .border-left-cart {
        border-left: solid 2px #7777;
        padding-bottom: 25px;
    }

    .rating {
        float: left;
        background: #FFB800;
        padding: 5px 13px;
        border-radius: 50px;
        font-size: 11px;
    }

    .fa-star:before {
        content: "\f005";
        position: relative;
        right: 3px;
    }

    .sold {
        border-left: solid 1px #1E1E1E80;
    }

    .sold p {
        font-family: poppins;
        font-size: 11.5px;
        font-weight: 600;
        color: #1E1E1E80;
    }

    .description .product-about i {
        font-size: 11px;
        line-height: 15px;
        letter-spacing: 0em;
        text-align: left;

    }

    .size button {
        border: solid 1px transparent;
        float: left;
        background-color: #1E1E1E0D;
        border-radius: 5px;
    }


    .size button:hover {
        background-color: #1E1E1E0D;
        border: solid 1px #FF061E;
        border-radius: 5px;
    }

    .size button:focus {
        outline: none;
        border: solid 1px #FF061E !important;
        border-radius: 5px !important;
    }

    .cart select {
        width: 100%;
        padding: 10px 0px;
        font-size: 10.88px;
        border-radius: 10px;
    }

    .cart .form-select {
        border: none;
        padding: 0px !important;
    }

    .form-select::before {
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        content: "\f007";
    }

    .cart .form-select:focus {
        outline: none !important;
    }

    .cart-btn {
        width: 100%;
        background: #FF061E !important;
        border: solid 1px #FF061E !important;
        border-radius: 10px !important;
        padding: 15px 0px !important;
        color: white !important;
        font-family: Poppins !important;
        font-size: 16px !important;
        font-weight: 600 !important;
        line-height: 24px !important;
        letter-spacing: 0em !important;
        text-align: center !important;

    }

    .cart-btn:hover {
        background-color: #c10416 !important;
    }

    .cart-btn:focus {
        outline: none !important;
    }

    .buy-btn {
        background-color: transparent !important;
        width: 100%;
        border: solid 1px #FF061E !important;
        border-radius: 10px !important;
        padding: 15px 0px !important;
        margin-top: 10px !important;
        color: #ff061e !important;
        font-family: Poppins !important;
        font-size: 16px !important;
        font-weight: 600 !important;
        line-height: 24px !important;
        letter-spacing: 0em !important;
        text-align: center !important;

    }

    .buy-btn:hover {
        color: white !important;
        border: solid 1px #000 !important;
        background-color: #000 !important;
    }

    .buy-btn:focus {
        outline: none !important;
    }

    .product-inner .sold-by {
        font-family: Poppins;
        font-size: 10px;
        font-weight: 600;
        line-height: 15px;
        letter-spacing: 0em;
        padding-top: 20px;
        margin: 0px;
    }

    .product-inner .desrptn {
        clear: both;
        font-family: Poppins;
        font-size: 11px;
        font-weight: 500;
        line-height: 18px;
        letter-spacing: 0em;

    }

    .price p {
        color: Red;
        font-family: Burbank Big Condensed;
        font-size: 42px;
        font-weight: 600;
        line-height: 42px;
        letter-spacing: 0.02em;
        text-align: left;

    }



    .price .discount {
        color: #1E1E1E;
        font-family: 'BURBANKBIGCONDENSED-BOLD' !important;
        font-size: 16px;
        font-weight: 600;
        line-height: 17px;
        letter-spacing: 0em;
        text-align: left;

    }

    .thum {
        text-align: center;
    }

    .product-about .about-item-desc p {
        font-family: Poppins;
        font-size: 11px;
        font-weight: 500;
        line-height: 15px;
        letter-spacing: 0em;
        text-align: left;

    }

    .prod-det .thum img {
        width: 20%;
        border-radius: 15px;
    }

    .prod-det .thum img:hover {
        border: solid 1px #BC0012;
        border-radius: 15px;
        opacity: 0.8;
    }

    .product-inner .title {
        float: left !important;
    }

    .prod-det .thum img:active {
        border: solid 1px #BC0012;
        border-radius: 15px;
    }

    .reviews .progress-bar {
        background-color: #FFC700;
    }

    .reviews .glyphicon-star:before {
        color: #FFC700;
    }

    .reviews .btn-sm {
        padding: 0px 0px !important;
        background: transparent;
        border: none;
    }

    .reviews .rating-block .glyphicon-star:before {
        font-size: 24px !important;

    }


    /* Plus-Minus Field */
    /* Google fonts import link */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .Plus-Minus {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #FFF;
        border-radius: 12px;
        border: solid 1px #1e1e1e;
        height: 50px;
    }

    .Plus-Minus span {
        width: 20%;
        text-align: center;
        font-size: 36px;
        font-weight: 600;
        cursor: pointer;
        user-select: none;
        height: 48px;

    }

    .minus {
        color: white;
        border-top-left-radius: 11px !important;
        border-bottom-left-radius: 11px !important;
        background: #1e1e1e;
    }

    .plus {
        color: white;
        border-top-right-radius: 11px !important;
        border-bottom-right-radius: 11px !important;
        background: #FF061E;
    }

    .plus:hover {
        background-color: #c10416 !important;
    }

    .Plus-Minus span.num {
        width: 80%;
        font-size: 18px;
        border-right: 2px solid rgba(0, 0, 0, 0.2);
        border-left: 2px solid rgba(0, 0, 0, 0.2);
        pointer-events: none;
        height: 25px;
    }

    .price-shipping {
        padding-top: 20px;
    }

    .reviews h5 {
        padding-top: 5px;
        clear: both;
        font-family: Poppins !important;
        color: #1E1E1E99;
        font-size: 14px !important;
        font-weight: 600 !important;
        line-height: 21px !important;
        letter-spacing: 0em !important;
    }

    .review-block-rate button {
        background: transparent;
        border: none;
        padding: 0px 0px !important;
    }

    .review-block .review-block-name a {
        color: #1E1E1E;
        font-family: Poppins;
        font-size: 18px;
        font-weight: 600;
        line-height: 28px;
        letter-spacing: 0em;

    }

    .review-block .col-sm-10 img {
        float: left;
        padding-right: 10px;
    }

    .rev-img img {
        padding: 8px 5px 8px 0px;
        width: 10% !important;
    }

    .rev-like {
        color: #000;
    }

    .reviews hr {
        color: #f10d0d99;
    }

    .location-select {
        border: solid 1px #8e8e8e;
        position: relative;
        padding: 15px 10px 15px 32px;
        border-radius: 12px;
        margin-bottom: 12px;
    }

    .location-select .fa-location-dot {
        color: #000;
        position: absolute;
        top: 14px;
        left: 12px;
        font-size: 18px;
    }

    .sort-by select {
        padding: 8px 90px 8px 15px;
        margin: 0px 5px;
        border-radius: 8px;
        border: solid 1px #8e8e8e;
    }

    .sortBy {
        display: flex;
        padding-right: 5px;
        align-items: flex-end;
    }

    .sortBy select:focus {
        outline: none !important;
    }

    .sortBy p {
        padding-right: 15px;
        padding-top: 7px;
    }

    .rightSort {
        padding-left: 0px !important;
        display: flex;
        justify-content: flex-end;
    }

    .viewBy {
        display: flex;
        align-items: center;
    }

    .viewBy p {
        padding-right: 12px;
        margin-bottom: 0px;
    }

    .my-filters {
        margin-right: 0px !important;
        margin-left: 0px !important;
    }

    .__text-12px {
        font-size: 13px !important;
        font-weight: 600 !important;
    }

    .__text-12px:hover {
        color: #FF061E !important;

        border: 1px solid #FF061E !important;
        /* background: #FF061E !important; */
        /* color: #FFF !important; */
    }

    .checkbox-alphanumeric input:checked~label {
        border: 1px solid #000 !important;
        /* border-color: #000 !important; */
        background: #000 !important;
        color: #FFF !important;
        font-size: 12px;
        font-weight: 500;

    }


    .orders .row {
        margin-left: 0px !important;
        margin-right: 0px !important;
    }

    .filters {
        margin-bottom: 25px;
    }

    .form-check {
        padding-left: 0px !important;
        margin-bottom: 5px !important;
    }

    .prod-filter-check .input-check {
        position: absolute;
        margin-top: 6.5px !important;
        margin-left: 0px !important;
    }

    .prod-filter-check .filter-check-lable {
        color: #757474;
        font-family: Poppins;
        font-size: 11px;
        font-weight: 400;
        line-height: 17px;
        letter-spacing: 0em;
        text-align: left;
        position: relative;
        left: 20px;
    }

    .left-col {
        border-right: solid 1px #1e1e1e80;
    }

    .filter-text {
        color: #757474;
        font-family: Poppins;
        font-size: 11px;
        font-weight: 400;
        line-height: 17px;
        letter-spacing: 0em;
        text-align: left;

    }

    .filter-check {
        accent-color: #FF061E;
    }

    .filter-price-div {
        padding: 0px !important;
        margin: 0px 0px 10px 0px !important;
    }

    .filter-price-div .filter-price {
        text-align: center;
        border-color: #1e1e1e80 !important;
    }

    .filter-price-div .filter-price:focus {
        box-shadow: none;
        border-color: #1e1e1e80 !important;
        outline: transparent !important;
    }

    .popup-btn {
        display: none !important;
    }

    .desktop p {
        color: #757474;
        font-family: Poppins !important;
        font-size: 11px !important;
        font-weight: 400 !important;
        line-height: 17px !important;
        letter-spacing: 0em !important;
        text-align: left !important;


    }

    .mob-cat-btn {
        display: none !important;
    }


    /* Shipping css START */

    .top .main-heading {
        color: #1E1E1E !important;
        font-family: Burbank Big Condensed !important;
        font-size: 33px !important;
        font-weight: 600 !important;
        line-height: 33px !important;
        letter-spacing: 0em !important;
        text-align: left !important;
    }

    .top p {
        color: rgba(30, 30, 30, 0.6);
        font-family: Poppins !important;
        font-size: 12px !important;
        font-weight: 500 !important;
        line-height: 18px !important;
        letter-spacing: 0em !important;
        text-align: left !important;

    }

    .Ship-row {
        border: solid 1px grey;
        padding: 25px 29px;
        background: transparent;
        margin: 15px 0px;
        border-radius: 15px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-content: flex-end;
        align-items: center;
    }

    .Ship-row:hover {
        border-color: #FF061E;
        background-color: #9302100D !important;
    }

    .Ship-row:active {
        border-color: #FF061E;
        background-color: #9302100D !important;
    }

    .Ship-row .compny input {
        position: relative;
        float: left;
        top: 17px;
    }

    .Ship-row .compny-title {
        color: #1E1E1E;
        font-family: Poppins;
        font-size: 20px;
        font-weight: 600;
        line-height: 30px;
        letter-spacing: 0em;
        text-align: left;
        padding-left: 35px;
    }

    .Ship-row .compny-desc {
        margin-top: -10px;
        margin-bottom: 0px !important;
        font-family: Poppins;
        font-size: 12px;
        font-weight: 500;
        line-height: 18px;
        letter-spacing: 0em;
        text-align: left;
        padding-left: 36px;
    }

    .Ship-row:hover .compny-title {
        color: #BC0012;
    }

    .Ship-row:active .compny-title {
        color: #BC0012;
    }

    .Ship-row:hover .shipping-rate {
        color: #BC0012 !important;
    }

    .Ship-row:active .shipping-rate {
        color: #BC0012 !important;
    }

    .Ship-row .shipping-rate {
        color: #1E1E1E;
        font-family: Poppins;
        font-size: 16px;
        font-weight: 600;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;

    }

    .ship-sub-btn {
        margin-top: 10px !important;
        border-radius: 12px !important;
        font-family: Poppins !important;
        font-size: 16px !important;
        font-weight: 700 !important;
        line-height: 14px !important;
        letter-spacing: 0em !important;
        text-align: center !important;
        background: #1E1E1E !important;
        width: 100% !important;
        color: #FFFFFF !important;
        padding: 20px 0px !important;
    }

    .ship-sub-btn:hover {
        background-color: #FF061E !important;
    }

    .ship-sub-btn:active {
        background-color: #FF061E !important;
    }

    .rad {
        accent-color: #FF061E;
    }

    /* Shipping css END */

    /* payment with css START */

    .Ship-col {
        width: 48%;
        margin: 0px 7px;
        float: left;
        border: solid 1px grey;
        padding: 45px 35px;
        background: transparent;
        border-radius: 15px;
    }

    .Ship-col:hover {
        border-color: #FF061E;
        background-color: #f8f5f5 !important;
    }

    .Ship-col .compny-title {
        padding-right: 12px;
        float: left;
        color: #1E1E1E;
        font-family: Poppins;
        font-size: 26px;
        font-weight: 600;
        line-height: 30px;
        letter-spacing: 0em;
        text-align: left;
    }

    .Ship-col .compny-desc {
        clear: both;
        margin-top: -10px;
        margin-bottom: 0px !important;
        font-family: Poppins;
        color: #757474;
        font-size: 14px;
        font-weight: 500;
        line-height: 21px;
        letter-spacing: 0em;
        text-align: left;

    }

    .Ship-col .rad {
        accent-color: #FF061E;
        border: 0px;
        width: 25px;
        height: 2em;
    }


    .Ship-Ser-form {
        clear: both;
    }

    .Ship-Ser-form .ship-form label {
        color: #5f5f5f;
        font-family: Poppins;
        font-size: 14px;
        font-weight: 600;
        line-height: 14px;
        letter-spacing: 0em;
        text-align: left;
        position: relative;
        top: 18px;
        left: 38px;
        background: white;
        padding: 3px 7px;
    }

    .Ship-Ser-form .select-col-33 label {
        color: #5f5f5f;
        font-family: Poppins;
        font-size: 14px;
        font-weight: 600;
        line-height: 14px;
        letter-spacing: 0em;
        text-align: left;
        position: relative;
        top: 18px;
        left: 38px;
        background: white;
        padding: 3px 7px;
    }


    .product-review-bot {
        padding: 0px !important;
    }



    .Ship-Ser-form .ship-form {
        float: left;
        width: 48%;
        margin: 0px 8px;
    }

    .Ship-Ser-form .select-col-33 {
        float: left;
        width: 32%;
        margin-left: 10px;
    }

    .Ship-Ser-form .form-group .ship-control {
        color: #000 !important;
        height: 70px !important;
        border-radius: 15px !important;
        font-family: Poppins;
        font-size: 14px;
        font-weight: 500;
        line-height: 14px;
        letter-spacing: 0em;
        text-align: left;
        padding-left: 28px;
    }

    .Ship-Ser-form .ship-sub-btn {
        margin-top: 60px !important;
    }

    .ship-control:focus {
        box-shadow: none !important;
        border-color: #ced4da !important;
    }


    ::placeholder {
        color: #c1bfbf !important;
    }

    /* payment with css END */

    /* Order CSS START */

    .top-filter {
        display: flex !important;
        margin-top: 40px !important;
        justify-content: space-between !important;
        align-items: center !important;
    }

    .top-filter .filter-btn a {
        font-family: Poppins;
        font-size: 12px;
        font-weight: 500;
        line-height: 18px;
        letter-spacing: 0em;
        text-align: left;
        padding: 5px 42px;
        background-color: #c1bfbf;
        color: black;
        border-radius: 8px;
        margin: 0px 3px;
    }

    .top-filter .filter-btn a:hover {
        background-color: #1E1E1E;
        color: white;
    }

    .top-filter .filter-btn a:focus {
        box-shadow: none;
    }

    .top-filter .filter-btn a:active {
        background-color: #1E1E1E;
        color: white;
    }

    .top-filter .user h4 {
        float: left;
        margin: 0px;
    }

    .top-filter .user img {
        padding-left: 7px;
    }

    .top-filter .sort {
        display: flex;
        justify-content: flex-end;
    }

    .top-filter .sort p {
        padding-top: 5px;
        float: left;
        margin-bottom: 0px;
        padding-right: 10px;

    }

    .top-filter .sort .order-sort {
        border-color: #8e8e8e;
        font-family: Poppins;
        font-size: 10px;
        font-weight: 400;
        line-height: 16px;
        letter-spacing: 0em;
        text-align: left;
        width: 72%;
    }

    .top-filter .sort .order-sort:focus {
        border-color: #8e8e8e;
        box-shadow: none;
    }

    .account {
        width: 18%;
        margin-right: 8px;
        border: solid 1px #c2bfbf;
        border-radius: 18px;
        padding: 25px 30px;
    }

    .inner-content {
        margin-top: 20px;
    }

    .orders .account li {
        padding: 5px 0px;
        color: #4a4949;
        font-family: Poppins;
        font-size: 12px;
        font-weight: 500;
        line-height: 18px;
        letter-spacing: 0em;
        text-align: left;
        position: relative;
        left: 28px;
    }

    .orders .account li a {
        color: #4a4949;
    }

    .orders .account li a:hover {
        text-decoration: none;
        color: #FF061E !important;
    }

    .orders .account li a:active {
        color: #FF061E;
    }

    .order-list {
        width: 80%;
        margin-left: 8px;
        border: solid 1px #c2bfbf;
        border-radius: 18px;
        padding: 25px 30px;
    }

    .orders .order-h4 {
        font-family: Poppins !important;
        font-size: 16px !important;
        font-weight: 600 !important;
        line-height: 24px !important;
        letter-spacing: 0em !important;
        text-align: left !important;

    }

    .order-row {
        padding: 2px 17px !important;
        margin: 0px 20px 15px 20px !important;
        border-radius: 12px !important;
        background: #eceaea !important;
    }

    .order-row .card-body h5 {
        margin-bottom: 0px;
        color: #1E1E1E;
        font-family: Poppins;
        font-size: 20px;
        font-weight: 600;
        line-height: 30px;
        letter-spacing: 0em;
        text-align: left;

    }

    .order-row .card-body p {
        font-size: 12px !important;
        font-weight: 500 !important;
        color: #706f6f;
    }

    .qty {
        display: flex;
        align-items: center;
        justify-content: space-around;
    }

    .qty p {
        color: #1E1E1E;
        font-family: Poppins !important;
        font-size: 16px !important;
        font-weight: 600 !important;
        line-height: 24px !important;
        letter-spacing: 0em !important;
        text-align: left !important;
        margin-bottom: 0px !important;
    }

    .card-img-top {
        width: 20% !important;
    }

    .order-card {
        background: none !important;
        border: none !important;
        display: flex;
        flex-direction: row !important;
        align-items: center !important;
    }

    .status {
        display: flex !important;
        justify-content: center;
        align-items: center !important;
        flex-wrap: wrap !important;
    }

    .status a {
        font-family: Poppins;
        font-size: 10px;
        font-weight: 500;
        line-height: 15px;
        letter-spacing: 0em;
        text-align: left;
        background: #FF9B06;
        padding: 8px 20px;
        border-radius: 8px;
        color: white;
    }

    .status a:hover {
        color: white;
    }

    .order-num {
        display: flex;
        justify-content: flex-end;
        flex-wrap: wrap;
        align-items: center;
        align-content: center;
    }

    .order-num .number {
        color: #1E1E1E !important;
        font-family: Poppins !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        line-height: 18px !important;
        letter-spacing: 0em !important;
        text-align: left !important;

    }

    .order-num .date {
        font-family: Poppins !important;
        font-size: 12px !important;
        font-weight: 500 !important;
        line-height: 18px !important;
        letter-spacing: 0em !important;
        text-align: left !important;

    }

    .order-num p {
        margin-bottom: 0px !important;
    }

    /* Display Mob-Xsmall */

    @media only screen and (max-width: 375px) {

        .rightSort {
            display: block !important;
        }

        .sortBy {
            width: 50%;
            float: left;
        }

        .viewBy {
            padding-left: 44px;
            width: 50%;
            float: left;
            display: block;
        }

        .viewBy p {
            padding-bottom: 15px;
        }

        .sort-by select {
            padding: 5px 0px 5px 0px !important;
        }

        .filter-btn {
            padding-right: 0px !important;
        }

        .filter-btn a {
            margin-bottom: 8px !important;
        }

        .order-row {
            display: block !important;
        }

        .order-card {
            display: block !important;
        }

        .order-list .order-row {
            padding: 12px 0px 12px 0px !important;
        }

        .order-card img {
            float: left;
        }

        .qty {
            float: left;
            flex: 0 0 50% !important;
            max-width: 50% !important;
            justify-content: flex-start;
        }

        .status {
            flex: 0 0 50% !important;
            max-width: 50% !important;
            justify-content: flex-end;
        }

        .order-num {
            padding-top: 12px;
            flex: 0 0 100% !important;
        }

        .order-card {
            padding-bottom: 10px;
            width: 100% !important;
        }

        .order-card-body {
            padding: 0px !important;
            position: relative;
            top: -5px;
            left: 15px;
        }

    }


    /* Display Mob */

    @media only screen and (max-width: 480px) {

        .container-fluid {
            padding: 0px 25px !important;
        }

        .border-left-cart {
            border: none !important;
        }

        .image .thum img {
            margin: 6px 5px !important;
        }

        .h2-heading {
            font-size: 26px !important;
        }

        .h3-heading {
            font-size: 24px !important;
        }

        .popup-btn {
            display: block !important;
        }

        .desktop {
            display: none !important;
        }

        .modal-btn {
            padding: 0px !important;
            position: relative !important;
            top: -9px !important;
            left: 15px;
            background: transparent !important;
            color: #ff061e !important;
            border: none !important;
        }

        .fa-bars:before {
            font-size: 18px !important;
        }

        .mob-cat-btn {
            font-size: 14px !important;
            display: block !important;
            position: relative;
            top: -14px !important;
            left: 25px;
        }

        .filter-col {
            margin-top: -20px !important;
        }

        .Ship-row {
            padding: 10px 10px !important;
        }

        .Ship-row .compny-title {
            font-size: 16px !important;
            line-height: 20px !important;
        }

        .Ship-row .shipping-rate p {
            font-size: 12px;
            line-height: 13px;
        }

        .Ship-row .shipping-logo img {
            width: 85% !important;
            float: right !important;
        }

        .Ship-row .compny-title {
            padding-left: 25px !important;
            padding-bottom: 5px;
        }

        .Ship-row .compny-desc {
            padding-left: 26px !important;
            padding-right: 12px !important;
        }

        .Ship-col {
            width: 100% !important;
            margin: 10px 0px !important;
        }

        .Ship-Ser-form .ship-form {
            width: 100% !important;
            margin: 0px !important;
        }

        .Ship-Ser-form .select-col-33 {
            width: 100% !important;
            margin: 0px !important;
        }

        .breadcrumbs .breadcrumb-item {
            font-size: 10px !important;
        }

        .sort-by {
            display: block;
            text-align: left;
        }

        .rightSort {
            display: flex;
            justify-content: space-between;
            padding-left: 18px;
        }

        .product-review-bot {
            padding-left: 0px !important;
            padding-right: 0px !important;
            width: 100% !important;
        }

        .viewBy p {
            font-size: 14px !important;
        }



        .sort-by {
            padding-left: 0px !important;
            padding-right: 0px !important;
            width: 100% !important;
        }

        .sort-by select {
            margin: 0px;
            padding: 5px 18px 5px 8px !important;
        }

        .review-block .row .col-sm-10 {
            width: 50%;
        }

        .review-block .row .col-sm-2 {
            width: 50%;
        }

        .review-block .row .col-sm-6 {
            padding-top: 10px !important;
        }

        .filters {
            width: 50% !important;
            float: left !important;
        }

        .account {
            display: none !important;
            width: 100% !important;
        }

        .account-mob {
            display: block !important;
        }

        .top-filter .user {
            padding: 0px;
            width: 100% !important;
        }

        .top-filter .filter-btn {
            text-align: left !important;
            margin-top: 15px;
            max-width: 100% !important;
            flex: none;
            padding-left: 0px;
        }

        .top-filter .filter-btn a {
            padding: 5px 18px !important;
        }

        .orders .inner-content {
            margin-top: 0px !important;
        }

        .order-list {
            width: 100% !important;
            margin: 0px !important;
            padding: 12px 10px !important;
        }

        .order-list .order-row {
            margin: 0px 0px;
            padding: 0px 0px 12px 0px;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .order-list .order-row .name {
            max-width: 100% !important;
        }

        .order-list .order-row .order-num {
            max-width: 100% !important;
            display: block !important;
        }

        .top-filter .sort {
            display: block !important;
            flex: none;
            max-width: 100% !important;
            margin-top: 15px;
            padding-left: 0px;
        }

        .orders .pop-btn {
            margin-top: 15px;
        }

        .orders .pop-btn .popup-btn {
            position: inherit !important;
            text-align: left;
        }

        .orders .mob-cat-btn {
            padding-top: 0px !important;
            margin-bottom: 0px !important;
            display: block !important;
            position: relative;
            top: -22px !important;
            left: 25px !important;
        }

        .sortBy {
            display: block !important;
        }

        .sortBy label {
            font-size: 14px !important;
        }
    }

    /* Display tab */

    @media only screen and (max-width: 1024px) {
        .border-left-cart {
            border: none !important;
        }

        .container-fluid {
            padding: 0px 25px !important;
        }

        .product-about .fa-circle-check {
            margin-top: 7px !important;
        }

        .h3-heading {
            padding-top: 10px !important;
        }

        .Ship-col {
            width: 47%;
            margin: 0px 10px;
            padding: 22px 15px;
        }

        .Ship-Ser-form .ship-form {
            width: 47%;
        }

        .Ship-Ser-form .select-col-33 {
            width: 31%;
            float: left;
            margin-left: 11px;
        }

        .filter-col {
            padding: 0px;
        }

        .prod-det .desktop {
            display: none;
        }

        .prod-det .product-review-bot {
            padding: 0px;
        }

        .modal-body .filters {
            width: 50%;
            float: left;
        }

        .prod-det .mob-cat-btn {
            font-size: 20px;
            display: block !important;
            position: relative;
            top: -11px;
            left: 23px;
        }

        .prod-det .popup-btn {
            position: relative;
            left: 15px;
            font-size: 28px;
            display: block !important;
            padding: 0px !important;
            background: transparent !important;
            color: #ff061e !important;
            border: none !important;
        }

        .top-filter .sort {
            padding-top: 15px;
            justify-content: center;
        }

        .top-filter .filter-btn {
            padding-top: 15px;
            text-align: center;
        }

        .top-filter .user {
            padding: 0px;
            margin-top: 15px;
        }


        .top-filter .filter-btn a {
            padding: 5px 31px;
        }


        .account {
            display: none;
            width: 100%;
        }

        .orders .pop-btn .popup-btn {
            text-align: left;
        }

        .orders .pop-btn {
            margin-top: 15px;
        }

        .orders .popup-btn {
            font-size: 28px;
            display: block !important;
            padding: 0px !important;
            background: transparent !important;
            color: #ff061e !important;
            border: none !important;
        }

        .account-mob {
            display: block !important;
        }

        .orders .mob-cat-btn {
            font-size: 20px;
            display: block !important;
            position: relative;
            top: -39px;
            left: 34px;
        }

        .orders .inner-content {
            margin-top: 0px !important;
        }

        .orders .order-list {
            width: 100% !important;
            margin-left: 0px !important;
        }

        .filter-col {
            flex: none !important;
            max-width: 100% !important;
        }

        .sortBy {
            display: block;
        }

        .sort-by select {
            padding: 8px 45px 8px 5px;
        }

    }
</style>
@push('script')
    <script type="text/javascript">
         $('#filter').change(function () {
            $('#filter-form').submit();
        });
        function checkQTY() {
            $val = document.getElementById('qtyProduct').value;
            productType = $($val).attr('product-type');
            minValue = parseInt($($val).attr('min'));
            maxValue = parseInt($($val).attr('max'));
            valueCurrent = parseInt($($val).val());

            var name = $($val).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Cart',
                    text: 'Sorry  the minimum order quantity does not match'
                });
                $($val).val($($val).data('oldValue'));
                document.getElementById('qtyProduct').value = $val - 1;
                document.querySelector(".num").innerText = $val - 1;
            }
            if (productType === 'digital' || valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Cart',
                    text: 'Sorry  stock limit exceeded.'
                });
                $($val).val($($val).data('oldValue'));
                document.getElementById('qtyProduct').value = $val - 1;
                document.querySelector(".num").innerText = $val - 1;
            }


        }


        cartQuantityInitialize();
        getVariantPrice();
        $('#add-to-cart-form input').on('change', function() {
            getVariantPrice();
        });

        function showInstaImage(link) {
            $("#attachment-view").attr("src", link);
            $('#show-modal-view').modal('toggle')
        }

        function focus_preview_image_by_color(key) {
            $('a[href="#image' + key + '"]')[0].click();
        }
    </script>
    <script>
        $(document).ready(function() {
            load_review();
        });
        let load_review_count = 1;

        function load_review() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: '{{ route('review-list-product') }}',
                data: {
                    product_id: {{ $product->id }},
                    offset: load_review_count
                },
                success: function(data) {
                    $('#product-review-list').append(data.productReview)
                    if (data.not_empty == 0 && load_review_count > 2) {
                        toastr.info('{{ \App\CPU\translate('no more review remain to load') }}', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        console.log('iff');
                    }
                }
            });
            load_review_count++
        }
    </script>

    {{-- Messaging with shop seller --}}
    <script>
        $('#contact-seller').on('click', function(e) {
            // $('#seller_details').css('height', '200px');
            $('#seller_details').animate({
                'height': '276px'
            });
            $('#msg-option').css('display', 'block');
        });
        $('#sendBtn').on('click', function(e) {
            e.preventDefault();
            let msgValue = $('#msg-option').find('textarea').val();
            let data = {
                message: msgValue,
                shop_id: $('#msg-option').find('textarea').attr('shop-id'),
                seller_id: $('.msg-option').find('.seller_id').attr('seller-id'),
            }
            if (msgValue != '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: '{{ route('messages_store') }}',
                    data: data,
                    success: function(respons) {
                        console.log('send successfully');
                    }
                });
                $('#chatInputBox').val('');
                $('#msg-option').css('display', 'none');
                $('#contact-seller').find('.contact').attr('disabled', '');
                $('#seller_details').animate({
                    'height': '125px'
                });
                $('#go_to_chatbox').css('display', 'block');
            } else {
                console.log('say something');
            }
        });
        $('#cancelBtn').on('click', function(e) {
            e.preventDefault();
            $('#seller_details').animate({
                'height': '114px'
            });
            $('#msg-option').css('display', 'none');
        });
    </script>

    <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=5f55f75bde227f0012147049&product=sticky-share-buttons"
        async="async"></script>
@endpush
<script>
    window.onload = function() {
        var span = document.createElement('span');

        span.className = 'fa';
        span.style.display = 'none';
        document.body.insertBefore(span, document.body.firstChild);

        //alert(window.getComputedStyle(span, null).getPropertyValue('font-family'));

        document.body.removeChild(span);
    };
</script>
