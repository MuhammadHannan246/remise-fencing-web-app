
<div class="">    
        <div class="inner122">
            <div class="">
@php($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews))

<div class="flash_deal_product">
    <div class=" d-flex flex-column">
        <div class=" d-flex align-items-center justify-content-center"
               >
           
            <div class="flash-deals-background-image">
                <a href="{{route('product',$product->slug)}}">
                    <img class="__img-125px"
                    src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}"
                        onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'">
                </a>
            </div>
        </div>
        <div class="flash_deal_product_details" style="width: 100%">
            
            <div class="d-flex mt-4">
                <div>
                    <div>
                        <span class="flash-product-title" style="color: #000;
                        font-size: 26px;
                        font-weight: 600;
                        font-family: 'BURBANKBIGCONDENSED-BOLD' !important;">
                            {{ $product['name'] }}
                        </span>
                    </div>
                    <div class="flash-product-review">
                        @for ($inc = 0; $inc < 5; $inc++)
                        @if ($inc < $overallRating[0])
                            {{-- <i
                                class="sr-star czi-star-filled active"></i> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffc700" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                        @else
                        

                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#1E1E1E33" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                        </svg>
                        @endif
                    @endfor
                        <label class="badge-style2">
                            ( {{ $product->reviews->count() }} )
                        </label>
                    </div>

                </div>
                
                <div class="d-flex align-items-center justify-content-between priceCol" style="width: 35%;">
                    <div>
                        @if ($product->discount > 0)
                            <p
                            style="font-size: 18px!important; color: #1E1E1E99; !important; font-weight:700;    text-decoration: line-through;
                            text-decoration-color: red; text-decoration-thickness:1.5px;
                            font-family: 'BURBANKBIGCONDENSED-BOLD' !important;">
                                {{ \App\CPU\Helpers::currency_converter($product->unit_price) }}
                            </p>
                        @endif
                    </div>
                    <div class="flash-product-price">

                        <p style="color: red;
                        font-family: 'BURBANKBIGCONDENSED-BOLD' !important;
                        font-size: 30px;
                        font-weight: 800;">
                            {{ \App\CPU\Helpers::currency_converter($product->unit_price - \App\CPU\Helpers::get_product_discount($product, $product->unit_price)) }}

                        </p>

                    </div>
                </div> 
                

            </div>
            
            {{-- <div class="text-{{Session::get('direction') === "rtl" ? 'right pr-3' : 'left pl-3'}}">
                <a href="{{route('product',$product->slug)}}">
                    {{ Str::limit($product['name'], 23) }}
                </a>
            </div>
            <div class="rating-show justify-content-between text-center">
                <span class="d-inline-block font-size-sm text-body">
                    @for($inc=0;$inc<5;$inc++)
                        @if($inc<$overallRating[0])
                            <i class="sr-star czi-star-filled active"></i>
                        @else
                            <i class="sr-star czi-star" style="color:#fea569 !important"></i>
                        @endif
                    @endfor
                    <label class="badge-style">( {{$product->reviews_count}} )</label>
                </span>
            </div>
            <div class="justify-content-between text-center">
                <div class="product-price text-center">
                    @if($product->discount > 0)
                        <strike style="font-size: 12px!important;color: #E96A6A!important;">
                            {{\App\CPU\Helpers::currency_converter($product->unit_price)}}
                        </strike><br>
                    @endif
                    <span class="text-accent">
                        {{\App\CPU\Helpers::currency_converter(
                            $product->unit_price-(\App\CPU\Helpers::get_product_discount($product,$product->unit_price))
                        )}}
                    </span>
                </div>
            </div> --}}

        </div>
       
    </div>
</div>

            </div>
        </div>
</div>



<style>
    .flash_deal_product{
        height: 310px;;
    }
    .__img-125px{
        width: 208px;
    }

    @media screen and (max-width:825px){
        
        .__img-125px{
        width: 225px;
    }

    }
</style>