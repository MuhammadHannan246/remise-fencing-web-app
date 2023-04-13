@extends('layouts.front-end.app')

@section('title', $web_config['name']->value . ' ' . \App\CPU\translate('Online Shopping') . ' | ' .
    $web_config['name']->value . ' ' . \App\CPU\translate(' Ecommerce'))

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Remise</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css"
            integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        @php($decimal_point_settings = !empty(\App\CPU\Helpers::get_business_settings('decimal_point_settings')) ? \App\CPU\Helpers::get_business_settings('decimal_point_settings') : 0)

    @section('content')

        <div class="container-fluid">


            <div class="row rowDiv">

                <div class="col col-lg-3 hideMobe"></div>


                <div class="col col-lg-6 col-md-12 col-sm-12">
                    <!-- <div class="innArea"> -->
                    <div class="innerArea4">

                        <div class="row">
                            <div class="col col-lg-7 col-md-12 col-sm-12 col-12">
                                @php($main_banner = \App\Model\Banner::where('banner_type', 'Main Banner')->where('published', 1)->orderBy('id', 'desc')->get())
                                @foreach ($main_banner as $banner)
                                    <div class="">
                                        <img class="img1"
                                            onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                            src="{{ asset('storage/app/public/banner') }}/{{ $banner['photo'] }}"
                                            alt="">
                                        <div class="innerBody">
                                            <div class="heading">
                                                <h1>Forem ipsum dolor sit</h1>
                                            </div>
                                            <div class="innerText">

                                            </div>
                                            <div class="btnBody">
                                                <button class="btnShop">Shop Now</button>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col col-lg-5 col-md-12 col-sm-12 col-12">
                                <div class="rightSide">
                                    <div class="">
                                        <img class="img2" {{-- onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" --}}
                                            src="{{ asset('storage/app/public/banner') }}/{{ $banner['photo'] }}"
                                            alt="">
                                        <div class="innerBody">
                                            <div class="heading">
                                                <h1>Forem ipsum dolor sit</h1>
                                            </div>
                                            <div class="innerText">

                                            </div>
                                            <div class="btnBody">
                                                <button class="btnShop">Shop Now</button>

                                            </div>
                                        </div>
                                        <div class="innerBody2">

                                            <div class="heading2">
                                                <h1>Sorem ipsum dolor</h1>
                                            </div>
                                            <div class="innerText2">
                                                <p>vorem ipsum dolor sit.</p>
                                            </div>
                                            <div class="priceBody2">
                                                <p>$200 <span>$200</span></p>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="">
                                        <div class="innerBody3">
                                            <img class="img3" {{-- onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" --}}
                                                src="{{ asset('storage/app/public/banner') }}/{{ $banner['photo'] }}"
                                                alt="">
                                            <div class="heading3">
                                                <h1>Horem ipsum</h1>
                                            </div>
                                            <div class="innerText3">
                                                <p>vorem ipsum dolor sit.</p>
                                            </div>
                                            <div class="priceBody3">
                                                <p>$200 <span>$200</span></p>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->




                </div>
            </div>

        </div>


        </div>

        <br><br>


        <div class="row">

            <div class="col-9">
                <h1 class="shopHeading">Shop Our Top Categories</h1>
            </div>
            <div class="col-3">
                <div class="innea5">
                    <a class=" viewBtn" href="#">View All ></i></a>

                </div>

            </div>

        </div>

        <br><br>
        <div class="cardsContainer d-flex justify-content-center ">
            <div class="row">

                <div class="col-12">
                    <div class="innerArea6">
                        <div class="inner1 cardOne">
                            @foreach ($categories as $key => $category)
                                @if ($key < 6)
                                    <div class="">
                                        <a
                                            href="{{ route('products', ['id' => $category['id'], 'data_from' => 'category', 'page' => 1]) }}">
                                            <div class="inner2">
                                                <div class="">
                                                    <img onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                        src="{{ asset("storage/app/public/category/$category->icon") }}"
                                                        alt="{{ $category->name }}">
                                                    <h2 class="cardText1">{{ Str::limit($category->name, 12) }}</h2>
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

        <br><br><br>
        <div class="row">
            <div class="col-12">
                <h1 class="shopHeading">Flash Sales</h1>
                <div class="innerArea6">
                    <div class="inner1 cardOne">
                        @foreach ($latest_products as $key => $product)
                            @if ($key < 6)
                                <div class="">
                                    <a href="">
                                        <div class="inner2">
                                            <div class="">
                                                @if(isset($product))
                                                @php($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews))
                                                <div class="flash_deal_product rtl" onclick="location.href='{{route('product',$product->slug)}}'">
                                                    @if($product->discount > 0)
                                                    <span class="for-discoutn-value p-1 pl-2 pr-2">
                                                        @if ($product->discount_type == 'percent')
                                                            {{round($product->discount,(!empty($decimal_point_settings) ? $decimal_point_settings: 0))}}%
                                                        @elseif($product->discount_type =='flat')
                                                            {{\App\CPU\Helpers::currency_converter($product->discount)}}
                                                        @endif {{\App\CPU\translate('off')}}
                                                    </span>
                                                    @endif
                                                    <div class=" d-flex">
                                                        <div class="d-flex align-items-center justify-content-center"
                                                             style="padding-{{Session::get('direction') === "rtl" ?'right:12px':'left:12px'}};padding-top:12px;">
                                                            <div class="flash-deals-background-image">
                                                                <img class="__img-125px"
                                                                 src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}"
                                                                 onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"/>
                                                            </div>
                                                        </div>
                                                        <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex align-items-center">
                                                            <div>
                                                                <div>
                                                                    <span class="flash-product-title">
                                                                        {{$product['name']}}
                                                                    </span>
                                                                </div>
                                                                <div class="flash-product-review">
                                                                    @for($inc=0;$inc<5;$inc++)
                                                                        @if($inc<$overallRating[0])
                                                                            <i class="sr-star czi-star-filled active"></i>
                                                                        @else
                                                                            <i class="sr-star czi-star" style="color:#fea569 !important"></i>
                                                                        @endif
                                                                    @endfor
                                                                    <label class="badge-style2">
                                                                        ( {{$product->reviews->count()}} )
                                                                    </label>
                                                                </div>
                                                                <div>
                                                                    @if($product->discount > 0)
                                                                        <strike
                                                                            style="font-size: 12px!important;color: #E96A6A!important;">
                                                                            {{\App\CPU\Helpers::currency_converter($product->unit_price)}}
                                                                        </strike>
                                                                    @endif
                                                                </div>
                                                                <div class="flash-product-price">
                                                                    {{\App\CPU\Helpers::currency_converter($product->unit_price-\App\CPU\Helpers::get_product_discount($product,$product->unit_price))}}

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


        <br><br>

        <div class="row">
            <div class="col-12">
                <div class="innerArea7">

                    @php(
    $main_section_banner = \App\Model\Banner::where('banner_type', 'Main Section Banner')->where('published', 1)->orderBy('id', 'desc')->latest()->first()
)
                    @if (isset($main_section_banner))
                        <div class="img22">
                            <img class="d-block"
                                src="{{ asset('storage/app/public/banner') }}/{{ $main_section_banner['photo'] }}">
                            <div class="innText">
                                <p class="redText">Lorem Ipsum</p>
                                <h1 class="whiteHeading">Sorem ipsum dolor sit amet elit.</h1>
                                <p class="whiteText">Dorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <button class="shop">Shop Now</button>

                            </div>

                        </div>
                    @endif


                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h1 class="shopHeading">Trending Products</h1>
                <div class="innerArea6">
                    <div class="inner1 cardOne">
                        @foreach ($latest_products as $key => $product)
                            @if ($key < 6)
                                <div class="">
                                    <a href="">
                                        <div class="inner2">
                                            <div class="">
                                                @if (isset($product))
                                                    @php($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews))
                                                    <div class="flash_deal_product rtl"
                                                        onclick="location.href='{{ route('product', $product->slug) }}'">
                                                        @if ($product->discount > 0)
                                                            <span class="for-discoutn-value p-1 pl-2 pr-2">
                                                                @if ($product->discount_type == 'percent')
                                                                    {{ round($product->discount, !empty($decimal_point_settings) ? $decimal_point_settings : 0) }}%
                                                                @elseif($product->discount_type == 'flat')
                                                                    {{ \App\CPU\Helpers::currency_converter($product->discount) }}
                                                                @endif {{ \App\CPU\translate('off') }}
                                                            </span>
                                                        @endif
                                                        <div class=" d-flex">
                                                            <div class="d-flex align-items-center justify-content-center"
                                                                style="padding-{{ Session::get('direction') === 'rtl' ? 'right:12px' : 'left:12px' }};padding-top:12px;">
                                                                <div class="flash-deals-background-image">
                                                                    <img class="__img-125px"
                                                                        src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $product['thumbnail'] }}"
                                                                        onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex align-items-center">
                                                                <div>
                                                                    <div>
                                                                        <span class="flash-product-title">
                                                                            {{ $product['name'] }}
                                                                        </span>
                                                                    </div>
                                                                    <div class="flash-product-review">
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
                                                                    </div>
                                                                    <div>
                                                                        @if ($product->discount > 0)
                                                                            <strike
                                                                                style="font-size: 12px!important;color: #E96A6A!important;">
                                                                                {{ \App\CPU\Helpers::currency_converter($product->unit_price) }}
                                                                            </strike>
                                                                        @endif
                                                                    </div>
                                                                    <div class="flash-product-price">
                                                                        {{ \App\CPU\Helpers::currency_converter($product->unit_price - \App\CPU\Helpers::get_product_discount($product, $product->unit_price)) }}

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
        <br><br><br>

        <div class="row">
            <div class="col-12">
                <div class="innerArea5">
                    <h1 class="shopHeading">Today’s Deals</h1>
                </div>
            </div>
        </div>

        <br>
        <div class="innerArea6">
            <div class="inner1">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="">

                            @foreach (\App\Model\Banner::where('banner_type', 'Footer Banner')->where('published', 1)->orderBy('id', 'desc')->take(3)->get() as $banner)
                                <div class="leftImg">
                                    <a href="{{ $banner->url }}" class="d-block">
                                        <img class="footer_banner_img"
                                            src="{{ asset('storage/app/public/banner') }}/{{ $banner['photo'] }}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="middleArea mx-5 my-5">
                            <label class="dealOfTheDay" for="dealOfTheDay" style="color:#fff;">Deal Of Day</label>
                            <h1 class="middleHeading">Vorem ipsum dolor
                                sit amet, consectetur</h1>
                            <label class="price1" for="price1">$999.99</label>
                            <h2 class="price2">$599</h2>
                            <p class="middleText">
                                Korem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum
                                est a, mattis
                                tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut
                                interdum tellus
                                elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent
                                taciti sociosqu
                                ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent auctor purus luctus
                                enim
                                egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse ac rhoncus nisl, eu
                                tempor urna.
                                Curabitur vel bibendum lorem. Morbi convallis convallis diam sit amet lacinia. Aliquam in
                                elementum
                                tellus.

                            </p>
                        </div>

                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="topImg">
                            <img class="footer_banner_img"
                                src="{{ asset('storage/app/public/banner') }}/{{ $banner['photo'] }}">
                            <h2 class="imageText">Vorem ipsum dolor
                                sit amet, consectetur</h2>

                        </div>
                        <div class="bottomImg">
                            <img class="footer_banner_img"
                                src="{{ asset('storage/app/public/banner') }}/{{ $banner['photo'] }}">
                            <h2 class="imageText">Vorem ipsum dolor
                                sit amet, consectetur</h2>

                        </div>
                    </div>
                </div>
            </div>

        </div>


        <br><br>
        <div class="row">
            <div class="col-12">
                <h1 class="shopHeading">For You</h1>
                <div class="innerArea6">
                    <div class="inner1 cardOne">
                        @foreach ($latest_products as $key => $product)
                            @if ($key < 6)
                                <div class="">
                                    <a href="">
                                        <div class="inner2">
                                            <div class="">
                                                @if (isset($product))
                                                    @php($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews))
                                                    <div class="flash_deal_product rtl"
                                                        onclick="location.href='{{ route('product', $product->slug) }}'">
                                                        @if ($product->discount > 0)
                                                            <span class="for-discoutn-value p-1 pl-2 pr-2">
                                                                @if ($product->discount_type == 'percent')
                                                                    {{ round($product->discount, !empty($decimal_point_settings) ? $decimal_point_settings : 0) }}%
                                                                @elseif($product->discount_type == 'flat')
                                                                    {{ \App\CPU\Helpers::currency_converter($product->discount) }}
                                                                @endif {{ \App\CPU\translate('off') }}
                                                            </span>
                                                        @endif
                                                        <div class=" d-flex">
                                                            <div class="d-flex align-items-center justify-content-center"
                                                                style="padding-{{ Session::get('direction') === 'rtl' ? 'right:12px' : 'left:12px' }};padding-top:12px;">
                                                                <div class="flash-deals-background-image">
                                                                    <img class="__img-125px"
                                                                        src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $product['thumbnail'] }}"
                                                                        onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex align-items-center">
                                                                <div>
                                                                    <div>
                                                                        <span class="flash-product-title">
                                                                            {{ $product['name'] }}
                                                                        </span>
                                                                    </div>
                                                                    <div class="flash-product-review">
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
                                                                    </div>
                                                                    <div>
                                                                        @if ($product->discount > 0)
                                                                            <strike
                                                                                style="font-size: 12px!important;color: #E96A6A!important;">
                                                                                {{ \App\CPU\Helpers::currency_converter($product->unit_price) }}
                                                                            </strike>
                                                                        @endif
                                                                    </div>
                                                                    <div class="flash-product-price">
                                                                        {{ \App\CPU\Helpers::currency_converter($product->unit_price - \App\CPU\Helpers::get_product_discount($product, $product->unit_price)) }}

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

        <br><br>

        <div class="row">
            <div class="col-12">
                <div class="innerArea9">
                    <button class="loadMore">
                        Load More
                    </button>
                </div>

            </div>
        </div>

        <br><br>
        </div>






        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
    @endsection
</body>

</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

    .innerArea {
        background: #000;
        height: 40px;
        display: flex !important;
        color: #fff;

    }

    .Mid {
        margin: 8px 10px;

    }

    .cont1 {
        color: #fff;
        /* margin: 10px 10px; */
        width: 50%;

    }

    .cont1 .lblTel {
        margin: 8px 10px;
    }

    .cont1 .lblTel i {
        margin: 0 7px;
    }

    .cont1 .discRight {
        float: right;
        margin: 8px 10px;
        /* border:  1px solid #fff; */


    }

    .cont2 {
        width: 50%;
        color: #fff;

    }

    .cont2 .shopNow {
        margin: 8px 10px;

    }

    .cont2 a {
        color: #fff;
    }

    .cont2 .rightSell {
        float: right;
    }

    .cont2 .sellOn {
        /* float: right; */
        margin: 8px 10px;

    }

    .cont2 .location {
        float: right;
        margin: 8px 10px;

    }

    .cont2 .location i {
        margin: 0 7px;

    }

    .innerArea2 {
        height: 100px;
        display: flex;
        border-bottom: 1px solid #7777;
    }

    .logo {
        width: 30%;
    }



    .logo .logoImg {
        width: 130px;
        margin: 20px 50px;

    }

    .form__upper {
        position: relative;
        width: 100%;
        height: 3rem;
        top: 52px;
        left: 0px;

    }

    .form__upper .logoImg1 {
        width: 130px;
        margin: 0px 77px;
        left: 361px;
        top: 50px;
        /* margin-left: 700px; */
    }


    .text_area {

        width: 292px;
        height: 100px;
        left: 278px;
        top: 137px;
        font-family: 'Burbank Big Condensed';
        font-style: normal;
        font-weight: 600;
        font-size: 33px;
        line-height: 0px;
        text-align: center;
        letter-spacing: 0.02em;
        color: #1E1E1E;
    }

    .text_area1 {
        font-family: 'Burbank Big Condensed';
        font-style: normal;
        font-weight: 600;
        width: 292px;
        height: 100px;
        font-size: 33px;
        color: #1E1E1E;
        margin-left: 610px;
    }

    .welcomeBack {
        font-size: 45px;
    }

    .span_text {
        font-size: 15px;
        font-weight: 300;
        color: #777;
        text-align: center;
    }

    .text_1 {
        margin-left: 500px;
        height: 120px;
    }

    .text_2 {
        margin-left: 500px;
        height: 120px;
    }

    .text_3 {
        /* margin-left: 500px; */
        height: 120px;
    }

    .frame-1 {
        height: 55px;
        width: 525px;
        margin-left: 6px;
        border: 1px solid #777777;
        border-radius: 15px;

    }

    .frame-2 {
        margin-left: 180px;
    }

    .frame-3 {
        height: 80px;
        width: 245px;
        margin-left: 10px;
        border: 1px solid black;
        border-radius: 15px;

    }

    .input1 {
        height: 78px;
        width: 242px;
        border-radius: 15px;
        border: none;
    }

    .input {
        height: 50px;
        width: 523px;
        border-radius: 15px;
        border: none;
        outline: none;
        background: none;
    }

    .input4 {
        height: 45px;
        width: 20px;
        border-radius: 15px;
        border: none;
        margin: -2px 33px 9px;
    }

    input[type=checkbox],
    input[type=radio] {
        margin: -2px 33px 9px;
        margin-top: 1px\9;
        line-height: normal;
    }

    .button {
        height: 55px;
        width: 100%;
        border-radius: 15px;
        border: none;
        background-color: black;
        color: white;
    }

    .searchBar {
        width: 80%;
        display: flex;
        flex-direction: row-reverse;
    }

    .innerArea2 form.example {
        width: 103%;
        height: 50px;
        background: #fff;
        border: 1px solid #1e1e1e7a;
        margin: 25px 0;

        border-radius: 5px;
        display: flex;
        flex-direction: row;
        font-family: 'poppins';

    }

    .row {
        width: 100%;
        margin: 0;
    }

    .col-12 {
        padding: 0;
        padding-right: 3px;
    }

    .innerArea2 form.example input {
        padding: 10px;
        font-size: 17px;


        border: none;
        border-radius: 20px;

        width: 100%;
        background: #ffff;
        font-family: 'poppins';
    }

    .innerArea2 form.example button {

        width: 100%;
        height: 48px;
        margin: 0 10px;
        margin-left: 30px;
        margin-top: 0 !important;
        padding: 10px 13px;
        background: #EC0000;
        color: white;
        font-size: 17px;
        border: 1px solid #EC0000;
        border-radius: 5px;
        margin-top: 2px;
        cursor: pointer;
        font-family: 'poppins';
    }

    @media screen and (max-width: 575px) {
        .getStartedBTN {
            margin-top: 10px;

        }
    }

    .innerArea2 .categoryy {
        background: #fff !important;
        color: #1e1e1e7a !important;
        border: none !important;
        border-radius: 0 !important;
        /* border-left: 2px solid #b8b3b3 !important; */
        border-left: 2px solid #1e1e1e7a !important;
    }

    .rightCart {
        display: flex;
        float: right;
        /* width: 30%; */

    }

    .rightCart .account {
        display: flex;
        width: 120px;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        color: #000;
        /* padding: 0px; */
        font-size: 18px;
    }

    .icon11 {
        margin-right: 10px;
        margin-bottom: 5px;
    }

    .innerArea3 {
        display: flex;
        /* width: 70%; */
        float: right;
    }

    .innerArea3 .nav {

        margin: 17px 5px;
    }

    .innerArea3 .nav-item {
        font-size: 18px;

    }

    .innerArea3 .nav-item .nav-link {
        color: #000;
    }

    .innerArea3 .nav-item .nav-link:hover {
        color: #EC0000;
        background: none;
    }

    .innerArea3 .nav-item .nav-link:active {
        color: #EC0000;
        background: none;

    }

    /* .innerr {

        display: grid;
        justify-items: center;
        float: left;
        padding: 20px 50px;
    } */

    .innerr2 {
        background: #EC0000;
        padding: 20px 20px;
        width: 300px;
    }

    .innerr .cate {
        font-size: 22px;
        color: #fff;
    }

    .innerr .hamburger-icon {
        margin-right: 20px;
    }

    .sideCategories {
        margin: 30px 0;
        /* border-bottom: 1px solid #1e1e1e7a; */
        color: #000;
        text-decoration: none;
    }

    .sideCategories:hover {
        text-decoration: none;
        cursor: pointer;
        color: #EC0000;
    }

    /* .innArea {
        display: -webkit-box;
        margin-top: 100px;

    } */

    .innerArea4 {
        display: inline-flex;

    }

    .innerArea4 .img1 {
        background-image:
            linear-gradient(to left, rgba(245, 246, 252, 0.52), rgba(0, 0, 0, 0.5)),
            url('pg11.jpg');
        width: 565px;
        height: 438px;
        margin-left: 35px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top center;

        border-radius: 15px;

    }




    .innerArea4 .img1 .innerBody .heading h1 {
        font-size: 35px;
        color: #FFF;
        font-weight: 600;
    }

    .innerArea4 .img1 .innerBody .innerText p {
        font-size: 14px;
        color: #fff;

    }

    .innerArea4 .img1 .innerBody .btnBody .btnShop {
        background-color: #EC0000;
        color: #fff;
        width: 116px;
        height: 33.02px;
        border: none;
    }

    .innerArea {
        display: inline-flex;
    }

    /* .innerArea4 .img2 {
        background-image:
            linear-gradient(to left, rgba(245, 246, 252, 0.48), rgba(0, 0, 0, 0.5)),
            url('img1.png');
        width: 363px;
        height: 213px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top center;
        margin: 0 10px;
        border-radius: 15px;
    } */

    /* .innerArea4 .img2 .innerBody2 {
        position: absolute;
        margin: 40px 10px;
        width: 80%;
    } */

    .innerArea4 .img2 .innerBody2 .heading2 h1 {
        font-size: 30px;
        color: #FFF;
        width: 20%;
        font-weight: 600;
    }

    .innerArea4 .img2 .innerBody2 .innerText2 p {
        color: #fff;
        font-size: 15px;
    }

    .innerArea4 .img2 .innerBody2 .priceBody2 p {

        font-size: 30px;
        color: #EC0000;
        font-weight: 600;
        margin-top: -10px;
    }

    .innerArea4 .img2 .innerBody2 .priceBody2 p span {
        font-size: 20px;
        color: #fff;
        text-decoration: line-through;
        text-decoration-color: #000;
        text-decoration-thickness: 2px;
        margin: 2px 5px;
    }

    /* .innerArea4 .img3 {
        background-image:
            linear-gradient(to left, rgba(245, 246, 252, 0.048), rgba(0, 0, 0, 0.5)),
            url('img2.png');
        width: 385px;
        height: 213px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top center;
        margin: 10px 10px;
        border-radius: 15px;
    } */

    /* .innerArea4 .img3 .innerBody3 {
        position: absolute;
        margin: 60px 10px;
        width: 80%;
    } */

    .innerArea4 .img3 .innerBody3 .heading3 h1 {
        font-size: 30px;
        color: #FFF;
        width: 20%;
        font-weight: 600;
    }

    .innerArea4 .img3 .innerBody3 .innerText3 p {
        color: #fff;
        font-size: 15px;
    }

    .innerArea4 .img3 .innerBody3 .priceBody3 p {

        font-size: 30px;
        color: #EC0000;
        font-weight: 600;
        margin-top: -10px;
    }

    .innerArea4 .img3 .innerBody3 .priceBody3 p span {
        font-size: 20px;
        color: #fff;
        text-decoration: line-through;
        text-decoration-color: #000;
        text-decoration-thickness: 2px;
        margin: 2px 5px;
    }

    /* .rightSide {
        margin: 0px 5px;
    } */

    .innerArea5 {
        display: flex;
        width: 100%;
    }

    /* .shopHeading {
        font-size: 40px;
        font-weight: 600;
        padding: 0 30px;
    } */

    /* .innerArea5 .viewBtn {

        color: black;
        margin-left: 645px;
        margin-top: 37px;
        text-decoration: underline;
    } */

    .innerArea6 {

        width: 100%;
    }

    .innerArea6 .inner1 {
        display: flex;
        justify-content: center;

    }

    .innerArea6 .inner1 .card1 {
        background: linear-gradient(to bottom, rgba(245, 246, 252, 0.048), rgba(0, 0, 0, 0.5)), url('image1.jpg');
        width: 200px;
        height: 240px;
        background-position: center;
        background-size: cover;
        border-radius: 15px;
        margin: 5px;

    }


    .innerArea6 .inner1 .cardText1 {
        color: #fff;
        position: absolute;
        margin-top: -45px;
        text-align: center;
        margin-left: 40px;

        font-size: 20px !important;
    }

    .innerArea6 .inner1 .card2 {
        background: linear-gradient(to bottom, rgba(245, 246, 252, 0.048), rgba(0, 0, 0, 0.5)), url('image2.jpg');
        width: 200px;
        height: 240px;
        background-position: center;
        background-size: cover;
        border-radius: 15px;
        margin: 5px;

    }

    .innerArea6 .inner1 .card2 .cardText1 {
        color: #fff;
        position: absolute;
        margin-top: 195px;
        text-align: center;
        margin-left: 45px;
    }


    .innerArea6 .inner1 .card3 {
        background: linear-gradient(to bottom, rgba(245, 246, 252, 0.048), rgba(0, 0, 0, 0.5)), url('image3.jpg');
        width: 200px;
        height: 240px;
        background-position: center;
        background-size: cover;
        border-radius: 15px;
        margin: 5px;

    }

    .innerArea6 .inner1 .card4 {
        background: linear-gradient(to bottom, rgba(245, 246, 252, 0.048), rgba(0, 0, 0, 0.5)), url('image4.jpg');
        width: 200px;
        height: 240px;
        background-position: center;
        background-size: cover;
        border-radius: 15px;
        margin: 5px;

    }

    .innerArea6 .inner1 .card5 {
        background: linear-gradient(to bottom, rgba(245, 246, 252, 0.048), rgba(0, 0, 0, 0.5)), url('image5.jpg');
        width: 200px;
        height: 240px;
        background-position: top center;
        background-size: cover;
        border-radius: 15px;
        margin: 5px;

    }

    .innerArea6 .inner1 .card6 {
        background: linear-gradient(to bottom, rgba(245, 246, 252, 0.048), rgba(0, 0, 0, 0.5)), url('image2.jpg');
        width: 200px;
        height: 240px;
        background-position: center;
        background-size: cover;
        border-radius: 15px;
        margin: 5px;

    }

    .innerArea6 .inner1 .inner2 {
        overflow: hidden;
        border-radius: 15px;
        width: 174px;
        vertical-align: middle;
        margin: 5px 10px;
        position: relative;




    }

    .innerArea6 .inner1 .inner2::before {

        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);


    }

    .innerArea6 .inner1 .inner2 img {
        /* overflow: hidden; */
        transform-origin: 65% 75%;
        transition: transform 1s, filter .3s ease-out;

    }

    .innerArea6 .inner1 .inner2 img:hover {
        transform: scale(1.1);

    }



    .innerArea7 {
        display: flex;
        justify-content: center;
    }

    .innerArea7 .img22 {
        background: linear-gradient(to left, rgb(42 42 42 / 52%), rgba(0, 0, 0, 1.5)), url('banner22.jpg');
        width: 1250px;
        height: 375px;
        background-position: center;
        background-size: cover;
        border-radius: 15px;

    }

    .innerArea7 .img22 .innText {
        position: absolute;
        margin-top: 180px !important;
        margin-left: 50px;
    }

    .innerArea7 .img22 .innText .redText {
        color: #EC0000;
        font-size: 18px;
        line-height: 0;
    }

    .innerArea7 .img22 .innText .whiteHeading {
        color: #fff;
        font-size: 45px;
        font-weight: 600;
        line-height: 1;

    }

    .innerArea7 .img22 .innText .whiteText {
        color: #fff;
        font-size: 20px;
        font-weight: 300 !important;
    }

    .innerArea7 .img22 .innText .shop {
        /* position: absolute; */
        color: #fff;
        background: #EC0000;
        border: none;
        padding: 10px 40px;
        border: none;
        border-radius: 5px;

        /* transition: 0.5s; */
    }

    .innerArea7 .img22 .innText .shop:hover {
        opacity: 0.7;
        /* padding-bottom: 15px; */

    }

    .innerArea8 .inn2 {
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .innerArea8 .inn2 .leftImg img {
        width: 430px;
        height: 856px;
        object-fit: cover;
        border-radius: 15px;

    }

    .innerArea8 .inn2 .rightArea {
        margin-top: 0px;
    }

    .topImg {
        background: linear-gradient(to bottom, rgb(42 42 42 / 52%), rgba(0, 0, 0, 0.5)), url('img3.jpg');
        width: 430px;
        height: 414px;
        background-position: center;
        background-size: cover;
        border-radius: 15px;
        margin-bottom: 20px;
    }

    .bottomImg {
        background: linear-gradient(to bottom, rgb(42 42 42 / 52%), rgba(0, 0, 0, 0.5)), url('img4.jpg');
        width: 430px;
        height: 414px;
        background-position: center;
        background-size: cover;
        border-radius: 15px;
        margin-top: 20px;
    }

    .middleArea {
        margin-bottom: 150px;
    }

    .middleArea .dealOfTheDay {

        background: #EC0000;
        color: #fff;
        padding: 10px 20px;
        border-radius: 8px
    }

    .middleArea .middleHeading {
        font-size: 34px;
        font-weight: 600 !important;
    }

    .middleArea .price1 {
        color: #777;
        font-size: 20px;
        line-height: 0;
        text-decoration: line-through;
        text-decoration-color: #EC0000;

    }

    .middleArea .price2 {
        font-size: 50px;
        font-weight: 600;
        color: #EC0000;
        line-height: 0;
        margin-top: 25px;

    }

    .middleArea .middleText {
        margin-top: 55px;
        font-size: 18px;
    }

    .imageText {
        color: #fff;
        position: absolute;
        margin-top: 300px;
        margin-left: 20px;
        font-size: 35px;
        font-weight: 700;
    }

    .innerArea9 {
        display: flex;
        justify-content: center;
    }

    .innerArea9 .loadMore {
        background: #fff;
        color: #000;
        border: 1px solid #EC0000;
        border-radius: 5px;
        font-size: 18px;
        font-weight: 600;
        padding: 12px 100px;
    }

    .innerArea9 .loadMore:hover {
        background: #EC0000;
        color: #FFF;
    }

    /* footer CSS */
    .footer {
        background: #000;
        padding-top: 100px;
    }

    .headingFoot {
        color: #fff;
    }

    .textFoot {
        color: #FFF;
        line-height: 0;
    }


    .footLogo {
        width: 180px;
    }

    .footText2 {
        color: #fff;
        font-size: 13px;
        font-weight: 300;
        text-align: justify;
    }

    .footRight {
        display: flex;
        justify-content: center;

    }

    .footMenu {
        margin-top: 32px !important;
    }

    .company {
        justify-content: center;
        align-items: center;
        /* margin: 24px 0px 24px 24px;
        margin-right: 0px; */
    }


    .comp3 {
        margin-left: 20px;
    }

    .comp2 {
        margin-left: 30px;
    }

    .comp1 {
        margin-left: 50px;
    }

    .companyName {
        color: #fff;
        font-size: 17px;
        margin-left: 20px;
        text-align: center;
        font-weight: 600;
    }

    @media screen and (max-width:480px) {
        .comp3 {
            margin-left: 0px;
        }

        .comp2 {
            margin-left: 0px;
        }

        .comp1 {
            margin-left: 10px;
        }

        .companyName {
            margin-left: 10px;
        }

        .searchMarketing {
            text-align: center;
        }

        .socialIcons {
            display: flex;
            justify-content: center;
            margin: 10px;
        }

        .textFoot {
            font-size: 12px;
        }
    }

    @media screen and (max-width: 825px) {
        .searchMarketing {
            text-align: center;
        }

        .socialIcons {
            display: flex;
            justify-content: center;
            margin: 10px;
        }

        .textFoot {
            font-size: 8px;
        }

        .companyName {
            margin-left: 0;
        }
    }

    .menuList {
        line-height: 2;
        font-size: 14px;
        list-style: none;
        color: #FFF;
        /* justify-content: center; */
    }

    .menuList .menuItem:hover {
        cursor: pointer;
        color: #FF061E;
    }

    .searchMarketing {
        color: #fff;
        font-size: 16px;
    }

    .iconSocial {
        color: #FFF;
        float: right;
        margin: 0 0 0 35px !important;
        font-size: 20px;
    }


    .mainDiv {
        display: grid;
        place-items: center;
        justify-items: center;
        align-items: start;
    }

    .form {
        position: relative;
        width: 100%;
        height: 3rem;
    }

    .form2 {
        position: relative;
        width: 40%;
        height: 3rem;
    }

    .form__input {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 1px solid #777777;
        border-radius: 15px;
        font-family: 'Poppins';
        outline: none;
        padding: 30px 20px;
        background: none;
    }

    .form__input2 {
        position: absolute;
        top: 0;
        left: 0;
        width: 243%;
        height: 100%;
        border: 1px solid #777777;
        border-radius: 15px;
        font-family: 'Poppins';
        outline: none;
        padding: 30px 20px;
        background: none;
        color: #000;

    }

    ::placeholder {
        color: #000;
    }

    .form__bt {
        position: relative;
        width: 40%;
        height: 3rem;
        top: 52px;

    }

    .form__Reg {
        position: relative;
        width: 40%;
        height: 3rem;
        top: 52px;
        left: 160px;
    }

    .form__label {
        position: absolute;
        top: -20px;
        left: 30px;
        background: #fff;
        color: #1E1E1EB2;
        padding: 10px;

    }

    .form__label2 {
        position: absolute;
        top: -20px;
        left: 30px;
        background: #fff;
        color: #1E1E1EB2;
        padding: 10px;

    }


    /* order summary page css */

    .breadcrumb {
        padding: 25px 50px !important;
        background-color: #fff !important;
        border-bottom: 1px solid #777777 !important;
    }

    .breadcrumb-item {
        color: #000 !important;
    }

    .breadcrumb .breadcrumb-item a {
        /* color: #BC0012; */
        color: #FF061E;


    }

    .breadcrumb .breadcrumb-item a:hover {
        color: #BC0012;
        text-decoration: none;
    }

    .breadItem a {
        color: #FF061E !important;

    }

    .breadcrumb-item+.breadcrumb-item::before {
        content: var(--bs-breadcrumb-divider, ">") !important;
    }

    .oderSumm {
        color: #000;
        font-weight: 600;
    }

    /* .divIn {
        position: relative;
        width: 93%;
        left: 50px;
        margin: 20px 0;
    } */

    .divInner {
        border: 1px solid #777777;
        padding: 20px;
        border-radius: 20px;
    }

    .summary {
        display: flex;
        justify-content: left;
        align-items: left;
    }

    .summary .image1 {
        width: 90px;
        height: 90px;
        object-fit: cover;
        border-radius: 15px;
        margin: 0 20px;
    }

    .summDetails {
        position: absolute;
        top: 38px;
        left: 150px;
        line-height: 1;
    }

    .orderNum {
        color: #1E1E1E99;

    }

    .delOrder a {
        color: #EC0000;
    }

    .delOrder a:hover {
        color: #EC0000;
        text-decoration: none;

    }

    .oneInn {
        display: flex;
        width: 100%;


    }

    .subTotal {
        color: #1E1E1EB2;
        font-size: 16px;

    }

    .oneInn .subPrice {
        position: absolute;
        left: 88%;

    }

    .quantity {
        position: absolute;
        left: 85%;
        top: 40%;

    }

    /* .quantityIncrease{
        width: 200px;
    } */
    .minusQuantity {
        margin: 0 10px;
        font-weight: 700;
        cursor: pointer;
        font-size: 17px
    }

    .numQuantity {
        margin: 0 20px;
        font-weight: 700;
        /* cursor: pointer; */
        font-size: 15px
    }

    .plusQuantity {
        margin: 0 10px;
        font-weight: 700;
        cursor: pointer;
        font-size: 20px
    }

    @media screen and (max-width: 500px) {

        .oneInn .subPrice {

            left: 70%;
        }

        .divIn {
            left: 15px;
        }

        .quantity {
            top: 50%;
            left: 70%;
        }

        .minusQuantity {
            margin: 1px;
        }

        .numQuantity {
            margin: 1px;
        }

        .plusQuantity {
            margin: 1px;
        }

    }

    @media screen and (max-width: 915px) {
        .oneInn .subPrice {

            left: 70%;
        }

        .divIn {
            left: 15px;
        }

        .quantity {
            top: 50%;
            left: 70%;
        }

        .minusQuantity {
            margin: 1px;
        }

        .numQuantity {
            margin: 1px;
        }

        .plusQuantity {
            margin: 1px;
        }


    }

    .btnCheckout {
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .checkoutButton {
        background: #000;
        color: #fff;
        /* padding: 10px 150px; */
        width: 1319px;
        height: 69px;
        border-radius: 15px;
        font-size: 16px;
        font-weight: 700;
        border: 1px solid #000;
    }

    .checkoutButton:hover {
        background: #EC0000;
        color: #fff;
        border: 1px solid #EC0000;
    }


    /* Shipping Page CSS */
    .shippingText {
        font-size: 15px;
        font-family: 'Poppins';
        line-height: 1;
    }

    .radioShip {
        /* position: absolute;
        top: 35%; */
        width: 25px !important;
        margin: 0px 20px !important;
        accent-color: red !important;

    }

    .shippingService {
        margin: 0 20px;
    }

    .shippingTime {
        position: absolute;
        top: 63%;
        left: 8.5%;
        font-weight: 500;
        color: #1E1E1E99;
    }

    .shipPrice {
        position: absolute;
        top: 45%;
        left: 50%
    }




    /* Profile Page CSS */
    .divInner2 {
        display: flex;

    }

    .editProfile {
        position: absolute;
        top: 68%;
        left: 82%;
        width: 145.19px;
        height: 38.29px;
        background: #000;
        color: #fff;
        float: right;
        border: 1px solid #000;
        border-radius: 8px;

    }

    /* .addAddress{
        position: absolute;
        top: 68%;
        left: 85%;
        width: 145.19px;
        height: 38.29px;
        background: #000;
        color: #fff;
        float: right;
        border: 1px solid #000;
        border-radius: 8px;

    }
    .addAddress:hover{
        background: #FF061E;
        border: 1px solid #FF061E;
    } */
    .editProfile:hover {
        background: #FF061E;
        border: 1px solid #FF061E;

    }

    .myAccountBar {
        border: 1px solid #8a8181a1;
        padding: 10px 30px;
        border-radius: 25px;
        height: 420px;
        display: grid;
        justify-items: stretch;
        margin-top: 10px;
    }

    .myAccountBar1 {
        border: 1px solid #8a8181a1;
        padding: 35px 30px;
        border-radius: 25px;
        height: 420px;
        display: grid;
        justify-items: stretch;
        margin-top: 10px;

    }

    .side-item a {
        text-decoration: none;
        color: #1E1E1ECC;
        line-height: 2;
        font-weight: 500;
    }

    .side-item a:hover {
        text-decoration: none;
        color: #FF061E;
    }

    .side-item a:focus {
        text-decoration: none;
        color: #FF061E;

    }

    .active {
        color: #FF061E;
        text-decoration: none;


    }

    .myAccHeading {
        color: #1E1E1E;
        font-size: 20px;
        font-weight: 600
    }


    /* Address Page CSS */

    .leftAddress {
        width: 100%;
        background: #1E1E1E0D;
        padding: 20px 15px 20px 30px;
        border-radius: 15px;

    }

    .custName {
        font-weight: 600;
        line-height: 1;
    }

    .home {
        background: #1E1E1ECC;
        color: #FFFFFF;
        padding: 5px 20px;
        border-radius: 5px;
        font-size: 11.53px;

    }

    .shipAdd {
        background: #1E1E1E40;
        padding: 5px 20px;
        font-size: 11.53px;
        border-radius: 5px;
        margin-left: 5px;
    }

    .custAddress {
        font-size: 13.09px;
        font-weight: 600;
    }

    .editBtn {
        color: #FF061E;
    }


    .editBtn:hover {
        color: #FF061E;
        text-decoration: none;
    }

    Labels {
        display: flex;
        justify-content: space-between;
        align-items: center;

    }

    .newRow {
        flex-wrap: nowrap !important;
    }

    .newCol {
        padding-right: 0 !important;
    }

    /* Payment Options Page CSS */

    .paymentheading {
        font-size: 33.26px;
        font-weight: 600;
        color: #1E1E1E;

    }

    .helloUser {
        font-size: 16px;
        font-weight: 600;
    }

    .d-flex {
        justify-content: space-between !important;
        align-items: center !important;
    }

    .newAddressBTN {
        width: 145px;
        height: 34px;
        background: #000;
        color: #fff;
        border: 1px solid #000;
        border-radius: 8px;
    }

    .newAddressBTN:hover {
        background: #FF061E;
        border: 1px solid #FF061E;
    }

    .custCardNum {
        font-weight: 600;
        line-height: 1;
        font-family: 'Poppins';

    }

    .cardsDetail {
        width: 25%;
    }

    .cardImg {
        width: 55px;
        height: 15.93px;
        object-fit: contain;
    }

    .editBtn1 {
        color: #000;
    }

    .editBtn1:hover {
        color: #000;
        text-decoration: none;
    }

    .delBtn1 {
        color: #FF061E;
    }

    .delBtn1:hover {
        color: #FF061E;
        text-decoration: none;
    }

    @media screen and (max-width: 450px) {
        .custCardNum {
            font-size: 14px;
        }

        .payBar {
            padding: 35px 5px;
            /* justify-content: space-around !important; */

        }


        .cardBox {
            padding: 15px 5px;
        }

    }


    @media screen and (max-width: 825px) {
        .logFooter {
            display: grid;
            justify-items: center;
        }

        .comp1 {
            display: grid;
            justify-items: center;
        }

        .comp2,
        .comp3,
        .comp4 {
            display: grid;
        }
    }





























    /* ------------------------------------------------------------------------------------
    New CSS Here
    ---------------------------------------------------------------------------------------*/

    /* ORDER SUMMARY PAGE CSS START */

    .orderContainer {
        padding-left: 0 !important;
        padding-right: 0 !important;
    }

    .divIn {
        position: relative;
        width: 100%;
        margin: 20px 0;
    }



    /* ORDER SUMMARY PAGE CSS END */


    /* HOME PAGE CSS START */

    .innerr {
        display: grid;
        justify-items: center;
        float: left;
        padding: 0px 20px;

    }

    .innerArea4 .img1 .innerBody {

        display: inline-block;
        margin: 265px 20px;
        width: 80%
    }

    .rightSide {
        margin-left: 225px;
    }

    .innerArea4 .img2 .innerBody2 {
        position: absolute;
        margin: 15px 15px;
        width: 80%;
    }

    .innerArea4 .img3 .innerBody3 {
        position: absolute;
        margin: 45px 15px;
        width: 80%;
    }

    /* .innerArea4 .img1 {
        background-image:
            linear-gradient(to left, rgba(245, 246, 252, 0.52), rgba(0, 0, 0, 0.5)),
            url('pg11.jpg');
        width: 562px;
        height: 438px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top center;

        border-radius: 15px;

    } */

    .innerArea4 .img3 {
        background-image:
            linear-gradient(to left, rgba(245, 246, 252, 0.048), rgba(0, 0, 0, 0.5)),
            url('img2.png');
        width: 355px;
        height: 213px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top center;
        margin: 10px 10px;
        border-radius: 15px;
    }

    .innerArea4 .img2 {
        background-image:
            linear-gradient(to left, rgba(245, 246, 252, 0.48), rgba(0, 0, 0, 0.5)),
            url('img1.png');
        width: 355px;
        height: 213px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top center;
        margin: 0 10px;
        border-radius: 15px;
    }

    .shopHeading {
        font-size: 40px;
        font-weight: 600;
        padding: 0 30px;
    }

    .innea5 {
        position: relative;
    }

    .innea5 .viewBtn {
        position: absolute;
        top: 45px;
        left: 205px;
        color: black;
        text-decoration: underline;
    }

    .offer {
        position: relative;
    }

    .offer .offerEndIn {
        position: absolute;
        top: 40px;
    }

    .cardTwo {
        /* margin-right: 80px; */
        margin-right: 26px;
    }

    .cardThree {
        /* margin-right: 150px; */
        margin-right: 50px;
    }

    .rowDiv {
        margin-left: 0 !important;
        margin-right: 0 !important;
    }

    .leftImg img {
        width: 450px;
        height: 850px;
        object-fit: cover;
        border-radius: 20px;
    }


    /* HOME CSS 1025px Screen */
    @media screen and (max-width: 1025px) {
        .hideMobe {
            display: none;

        }

        .img1 {
            width: 570px !important;
        }

        .innea5 .viewBtn {
            top: 30px;
            left: 130px;

        }

        .innerArea6 .inner1 {
            flex-wrap: wrap;
        }

        .topImg {
            width: 335px;
        }

        .bottomImg {
            width: 335px;
        }

        .imageText {
            margin-top: 210px;
        }
    }

    /* Tablet CSS HOME */

    @media screen and (max-width: 825px) {
        .innerr {
            display: none;
        }

        .rightSide {
            display: flex;
            /* margin-left: 0; */
            margin: 2px 2px;

        }

        .img1 {
            width: 725px !important;
            height: 438px !important;
            margin: 2px 7px;

        }

        .cardTwo {
            margin-right: 0px;
        }

        .cardThree {
            margin-right: 0px;
        }

        .innerArea4 .img2 {
            margin: 0 2px;
            width: 360px !important;

        }

        .innerArea4 .img3 {
            width: 360px !important;
            margin: 0 2px;
        }

        .innea5 .viewBtn {
            top: 12px;
            left: 60px;
        }

        .shopHeading {
            font-size: 30px;
        }

        .offer .offerEndIn {
            top: 30px;
        }

        .leftImg img {
            width: 335px;
            height: 740px;
        }

        .middleArea .middleHeading {
            font-size: 25px;
        }

        .middleArea .price2 {
            font-size: 35px;
        }

        .middleArea .middleText {
            margin-top: 46px;
            font-size: 12px;
        }

        .topImg {
            width: 250px;
            height: 360px;
        }

        .bottomImg {
            width: 250px;
            height: 360px;
        }

        .imageText {
            margin-top: 115px;
            font-size: 28px;

        }

        .innerArea4 .img1 {
            margin-left: 0px;
        }
    }




    /* Mobile CSS HOME */
    @media screen and (max-width: 425px) {

        .side1 {
            display: none;
        }

        .innerr {
            display: none;

        }

        .rightSide {
            display: flex;
            /* margin-left: 0; */
            margin: 2px 2px;
            flex-direction: column;

        }

        .img1 {
            width: 336px !important;
            height: 213px !important;
            margin: 2px 0px;
        }

        .innerArea4 .img1 {
            margin-left: 0;
        }

        .innerArea4 .img1 .innerBody {

            margin: 0px 10px;
        }

        .innerArea4 .img2 {
            width: 336px !important;
            margin: 2px 0px;
        }

        .innerArea4 .img3 {
            width: 336px !important;

            margin: 2px 0px;
        }

        .innerArea4 .img1 .innerBody .heading h1 {
            font-size: 25px;
        }


        .innerArea4 .img2 .innerBody2 {
            margin: 50px 15px;
        }

        .innerArea4 .img2 .innerBody2 .heading2 h1 {
            font-size: 25px;
        }

        .innerArea4 .img2 .innerBody2 .priceBody2 p {
            font-size: 25px;
        }

        .innerArea4 .img2 .innerBody2 .priceBody2 p span {
            font-size: 16px;
        }

        .innerArea4 .img3 .innerBody3 .heading3 h1 {
            font-size: 25px;
        }

        .innerArea4 .img3 .innerBody3 .priceBody3 p {
            font-size: 25px;
        }

        .innerArea4 .img3 .innerBody3 .priceBody3 p span {
            font-size: 16px;
        }

        .innerArea4 .img1 .innerBody .btnBody .btnShop {
            width: 100px;
        }

        .shopHeading {
            font-size: 15px;
        }

        .innea5 .viewBtn {
            font-size: 12px;
            top: 0px;
            left: 0px
        }

        .innerArea6 .inner1 {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .innerArea6 .inner1 .cardText1 {
            margin-top: -35px;
            margin-left: 39px;

        }

        .offer .offerEndIn {
            top: 20px;
        }

        .innerArea7 .img22 {
            height: 200px;
        }

        .innerArea7 .img22 .innText {
            margin-top: 50px !important;
            margin-left: 25px;

        }

        .innerArea7 .img22 .innText .redText {

            font-size: 12px;
        }

        .innerArea7 .img22 .innText .whiteHeading {
            font-size: 16px;

        }

        .innerArea7 .img22 .innText .whiteText {

            font-size: 9px;

        }

        .innerArea7 .img22 .innText .shop {
            padding: 6px 20px;
        }

        .leftImg img {
            width: 348px;
            height: 400px;

        }

        .middleArea .middleHeading {
            font-size: 25px;
        }

        .middleArea .middleText {
            font-size: 9px;

        }

        .topImg {
            width: 348px;
            height: 250px;
        }

        .bottomImg {
            width: 348px;
            height: 250px;
        }

        .imageText {
            margin-top: 0;

        }

        .hideMobe {
            display: none;
        }
    }
</style>
@push('script')
    {{-- Owl Carousel --}}
    <script src="{{ asset('public/assets/front-end') }}/js/owl.carousel.min.js"></script>

    <script>
        $('#flash-deal-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 20,
            nav: true,
            navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{ session('direction') }}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 2
                },
                //Extra extra large
                1400: {
                    items: 3
                }
            }
        })

        $('#web-feature-deal-slider').owlCarousel({
            loop: false,
            autoplay: true,
            margin: 20,
            nav: false,
            //navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{ session('direction') }}': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 2
                },
                //Extra extra large
                1400: {
                    items: 2
                }
            }
        })

        $('#new-arrivals-product').owlCarousel({
            loop: true,
            autoplay: false,
            margin: 20,
            nav: true,
            navText: ["<i class='czi-arrow-{{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}'></i>",
                "<i class='czi-arrow-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}'></i>"
            ],
            dots: false,
            autoplayHoverPause: true,
            '{{ session('direction') }}': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        })
    </script>
    <script>
        $('#featured_products_list').owlCarousel({
            loop: true,
            autoplay: false,
            margin: 20,
            nav: true,
            navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '{{ session('direction') }}': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 5
                },
                //Extra extra large
                1400: {
                    items: 5
                }
            }
        });
    </script>
    <script>
        $('#brands-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 10,
            nav: false,
            '{{ session('direction') }}': true,
            dots: true,
            autoplayHoverPause: true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 4
                },
                360: {
                    items: 5
                },
                375: {
                    items: 5
                },
                540: {
                    items: 5
                },
                //Small
                576: {
                    items: 6
                },
                //Medium
                768: {
                    items: 7
                },
                //Large
                992: {
                    items: 9
                },
                //Extra large
                1200: {
                    items: 11
                },
                //Extra extra large
                1400: {
                    items: 12
                }
            }
        })
    </script>

    <script>
        $('#category-slider, #top-seller-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 20,
            nav: false,
            // navText: ["<i class='czi-arrow-left'></i>","<i class='czi-arrow-right'></i>"],
            dots: true,
            autoplayHoverPause: true,
            '{{ session('direction') }}': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 2
                },
                360: {
                    items: 3
                },
                375: {
                    items: 3
                },
                540: {
                    items: 4
                },
                //Small
                576: {
                    items: 5
                },
                //Medium
                768: {
                    items: 6
                },
                //Large
                992: {
                    items: 8
                },
                //Extra large
                1200: {
                    items: 10
                },
                //Extra extra large
                1400: {
                    items: 11
                }
            }
        })
    </script>
@endpush
