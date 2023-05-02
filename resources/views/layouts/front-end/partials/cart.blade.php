{{--code improved Md. Al imrun Khandakar--}}
<div class="navbar-tool navCart fontt {{Session::get('direction') === "rtl" ? 'mr-md-3' : 'ml-md-3'}}"
     style="margin-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 6px; ">
    <a class="bg-secondary " href="{{route('shop-cart')}}" >
        {{-- <span class="navbar-tool-label">
            @php($cart=\App\CPU\CartManager::get_cart())
            {{$cart->count()}}
        </span> --}}
        {{-- <i class="navbar-tool-icon czi-cart" style="color:black; font-size: 25px;"></i> --}}
        {{-- <i class="fa-solid fa-cart-shopping cartICO" style="color:black; font-size: 22px;"></i> --}}

        <svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M24.5106 5.55176L22.4918 12.1647C22.0259 13.86 20.7576 14.8824 19.1271 14.8824H8.58C7.97177 14.8824 7.44118 14.4553 7.31177 13.86L5.51294 5.44824V5.40941L5.11176 3.52C5.00823 2.97647 4.56824 2.58824 4.05059 2.58824H1.29412C0.582353 2.58824 0 2.00588 0 1.29412C0 0.582353 0.582353 0 1.29412 0H4.05059C5.81059 0 7.32471 1.26824 7.66118 3.01529L7.82941 3.88235H23.2812C23.6824 3.88235 24.0706 4.07647 24.3165 4.41294C24.5624 4.73647 24.6271 5.16353 24.5106 5.55176Z" fill="#1E1E1E"/>
            <path d="M10.3529 22C11.7823 22 12.9411 20.8412 12.9411 19.4118C12.9411 17.9823 11.7823 16.8235 10.3529 16.8235C8.92344 16.8235 7.76465 17.9823 7.76465 19.4118C7.76465 20.8412 8.92344 22 10.3529 22Z" fill="#1E1E1E"/>
            <path d="M18.7645 22C20.1939 22 21.3527 20.8412 21.3527 19.4118C21.3527 17.9823 20.1939 16.8235 18.7645 16.8235C17.3351 16.8235 16.1763 17.9823 16.1763 19.4118C16.1763 20.8412 17.3351 22 18.7645 22Z" fill="#1E1E1E"/>
            </svg>
            

    Cart
</a>

    {{-- <a class="navbar-tool-text {{Session::get('direction') === "rtl" ? 'mr-2' : 'ml-2'}}" href="{{route('shop-cart')}}"><small style="font-size: 16px;
        font-weight: 700; color:black !important;">Cart</small>
    </a> --}}
    <!-- Cart dropdown-->
   
    {{-- <div class="dropdown-menu dropdown-menu-{{Session::get('direction') === "rtl" ? 'left' : 'right'}} __w-20rem ">
        <div class="widget widget-cart px-3 pt-2 pb-3">
            @if($cart->count() > 0)
                <div class="__h-15rem" data-simplebar data-simplebar-auto-hide="false">
                    @php($sub_total=0)
                    @php($total_tax=0)
                    @foreach($cart as  $cartItem)
                        <div class="widget-cart-item pb-2">
                            <button class="close text-danger " type="button" onclick="removeFromCart({{ $cartItem['id'] }})"
                                    aria-label="Remove"><span
                                    aria-hidden="true">&times;</span>
                            </button>
                            <div class="media">
                                <a class="d-block {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"
                                   href="{{route('product',$cartItem['slug'])}}">
                                    <img width="64"
                                         onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                         src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$cartItem['thumbnail']}}"
                                         alt="Product"/>
                                </a>
                                <div class="media-body">
                                    <h6 class="widget-product-title">
                                        <a href="{{route('product',$cartItem['slug'])}}">{{Str::limit($cartItem['name'],30)}}</a></h6>
                                    @foreach(json_decode($cartItem['variations'],true) as $key =>$variation)
                                        <span class="__text-14px">{{$key}} : {{$variation}}</span><br>
                                    @endforeach
                                    <div class="widget-product-meta">
                                        <span
                                            class="text-muted {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}">x {{$cartItem['quantity']}}</span>
                                        <span
                                            class="text-accent {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}">
                                                {{\App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount'])*$cartItem['quantity'])}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php($sub_total+=($cartItem['price']-$cartItem['discount'])*$cartItem['quantity'])
                        @php($total_tax+=$cartItem['tax']*$cartItem['quantity'])
                    @endforeach
                </div>
                <hr>
                <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                    <div
                        class="font-size-sm {{Session::get('direction') === "rtl" ? 'ml-2 float-left' : 'mr-2 float-right'}} py-2 ">
                        <span class="">{{\App\CPU\translate('Subtotal')}} :</span>
                        <span
                            class="text-accent font-size-base {{Session::get('direction') === "rtl" ? 'mr-1' : 'ml-1'}}">
                             {{\App\CPU\Helpers::currency_converter($sub_total)}}
                        </span>
                    </div>

                    <a class="btn btn-outline-secondary btn-sm" href="{{route('shop-cart')}}">
                        {{\App\CPU\translate('Expand cart')}}<i
                            class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'}}"></i>
                    </a>
                </div>
                <a class="btn btn--primary btn-sm btn-block" href="{{route('checkout-details')}}">
                    <i class="czi-card {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}} font-size-base align-middle"></i>{{\App\CPU\translate('Checkout')}}
                </a>
            @else
                <div class="widget-cart-item">
                    <h6 class="text-danger text-center m-0"><i
                            class="fa fa-cart-arrow-down"></i> {{\App\CPU\translate('Empty')}} {{\App\CPU\translate('Cart')}}
                    </h6>
                </div>
            @endif
        </div>
    </div>
     --}}

    </div>
{{--code improved Md. Al imrun Khandakar--}}
{{--to do discount--}}
