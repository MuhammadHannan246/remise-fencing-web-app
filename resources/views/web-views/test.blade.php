<div class="container px-auto">
    <div class="row mx-auto">
        <div class="col-12">
            <h1 class="shopHeading">Flash Sales</h1>
            <div class="innerArea6">
                <div class="inner1 cardOne">
                    @foreach ($latest_products as $key => $product)
                        @if ($key < 6)
                            <div class="">
                                <a href="" class="underLine">
                                    <div class="inner122">
                                        <div class="">
                                            @if (isset($product))
                                                @php($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews))
                                                <div class="flash_deal_product rtl"
                                                    onclick="location.href='{{ route('product', $product->slug) }}'">
                                                    {{-- @if ($product->discount > 0)
                                                        <span class="for-discoutn-value p-1 pl-2 pr-2">
                                                            @if ($product->discount_type == 'percent')
                                                                {{ round($product->discount, !empty($decimal_point_settings) ? $decimal_point_settings : 0) }}%
                                                            @elseif($product->discount_type == 'flat')
                                                                {{ \App\CPU\Helpers::currency_converter($product->discount) }}
                                                            @endif
                                                            {{ \App\CPU\translate('off') }}
                                                        </span>
                                                    @endif --}}
                                                    <div class=" d-flex flex-column">
                                                        <div class="d-flex align-items-center justify-content-center"
                                                            >
                                                            <div class="flash-deals-background-image">
                                                                <img class="__img-125px"
                                                                    src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $product['thumbnail'] }}"
                                                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="flash_deal_product_details"  style="width: 100%">
                                                            <div class="d-flex mt-4">
                                                                <div>
                                                                    <span class="flash-product-title" style="color: #000;
                                                                    font-size: 20px;
                                                                    font-weight: 600;">
                                                                        {{ $product['name'] }}
                                                                    </span>
                                                                </div>
                                                                {{-- <div class="flash-product-review">
                                                                    @for ($inc = 0; $inc < 5; $inc++)
                                                                        @if ($inc < $overallRating[0])
                                                                            <i
                                                                                class="sr-star czi-star-filled active"></i>
                                                                        @else
                                                                            <i class="sr-star czi-star"
                                                                                style="color:#fea569 !important"></i>
                                                                        @endif
                                                                    @endfor
                                                                    <label class="badge-style2">
                                                                        ( {{ $product->reviews->count() }} )
                                                                    </label>
                                                                </div> --}}
                                                                <div class="d-flex" style="width: 27%;">
                                                                    <div>
                                                                        @if ($product->discount > 0)
                                                                            <p 

                                                                                style="font-size: 14px!important; color: #1E1E1E99; !important; font-weight:700;    text-decoration: line-through;
                                                                                text-decoration-color: red; text-decoration-thickness:1.5px;">
                                                                                {{ \App\CPU\Helpers::currency_converter($product->unit_price) }}
                                                                            </p>
                                                                        @endif
                                                                    </div>
                                                                    <div class="flash-product-price">

                                                                        <p style="color: red;
                                                                        font-size: 20px;
                                                                        font-weight: 800;">
                                                                        {{ \App\CPU\Helpers::currency_converter($product->unit_price - \App\CPU\Helpers::get_product_discount($product, $product->unit_price)) }}
                                                                    </p>
                                                                    </div>
                                                                </div>
                                                                

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>

    </div>

</div>
