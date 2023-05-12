@extends('layouts.front-end.app')

@section('title', $web_config['name']->value . ' ' . \App\CPU\translate('Online Shopping') . ' | ' .
    $web_config['name']->value . ' ' . \App\CPU\translate('Ecommerce'))

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Remise</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

        <link rel="stylesheet" href="style.css">




         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

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

        <div class="container">


            <div class="row rowDiv">

                @php($categories = \App\Model\Category::with(['childes.childes'])->where('position', 0)->priority()->paginate(11))
                <ul style="margin-left: 5px"
                    class="navbar-nav mega-nav pr-2 pl-2 toggleCat {{ Session::get('direction') === 'rtl' ? 'mr-2' : 'mr-2' }} d-none d-xl-block __mega-nav">
                    <li class="nav-item {{ !request()->is('/') ? 'dropdown' : '' }}">
                        <a class="nav-link  {{ Session::get('direction') === 'rtl' ? 'pr-0' : 'pl-0' }}"
                            href="#" data-toggle="dropdown"
                            style=" color: #fff !important; {{ request()->is('/') ? 'pointer-events: none' : '' }}">
                            <i class="czi-menu align-middle mt-n1 {{ Session::get('direction') === 'rtl' ? 'mr-2' : 'mr-2' }}"
                                style="color:#fff;"></i>
                            <span class="navCate fontt2"
                                style="text-transform: capitalize !important; color:#fff;">
                                {{ \App\CPU\translate('Browse Categories') }}
                            </span>
                        </a>
                        @if (request()->is('/'))
                            <ul class="dropdown-menu __dropdown-menu"
                                style="{{ Session::get('direction') === 'rtl' ? 'text-align: right;' : 'text-align: left;' }}padding-bottom: 32px!important; width: 107%;">
                                @foreach ($categories as $key => $category)
                                    @if ($key < 5)
                                        <li class="dropdown">
                                            <a class="dropdown-item flex-between paraentDrop" <?php if ($category->childes->count() > 0) {
                                                echo "data-toggle='dropdown'";
                                            } ?>
                                                href="javascript:"
                                                onclick="location.href='{{ route('products', ['id' => $category['id'], 'data_from' => 'category', 'page' => 1]) }}'">
                                                <div class="d-flex">

                                                    <span
                                                        class="w-0 flex-grow-1 childDrop {{ Session::get('direction') === 'rtl' ? 'pr-3' : 'pl-3' }}">{{ $category['name'] }}</span>
                                                    <i
                                                        class="czi-arrow-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }} __inline-15"></i>

                                                </div>
                                                @if ($category->childes->count() > 0)
                                                    <div>
                                                        <i class="czi-arrow-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }} __inline-15"
                                                            style="display:none;"></i>
                                                    </div>
                                                @endif
                                            </a>
                                            @if ($category->childes->count() > 0)
                                                <ul class="dropdown-menu"
                                                    style="right: 100%; text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};">
                                                    @foreach ($category['childes'] as $subCategory)
                                                        <li class="dropdown">
                                                            <a class="dropdown-item flex-between" <?php if ($subCategory->childes->count() > 0) {
                                                                echo "data-toggle='dropdown'";
                                                            } ?>
                                                                href="javascript:"
                                                                onclick="location.href='{{ route('products', ['id' => $subCategory['id'], 'data_from' => 'category', 'page' => 1]) }}'">
                                                                <div>
                                                                    <span
                                                                        class="{{ Session::get('direction') === 'rtl' ? 'pr-3' : 'pl-3' }}">{{ $subCategory['name'] }}</span>
                                                                </div>
                                                                @if ($subCategory->childes->count() > 0)
                                                                    <div>
                                                                        <i
                                                                            class="czi-arrow-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }} __inline-15"></i>
                                                                    </div>
                                                                @endif
                                                            </a>
                                                            @if ($subCategory->childes->count() > 0)
                                                                <ul class="dropdown-menu __r-100"
                                                                    style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};">
                                                                    @foreach ($subCategory['childes'] as $subSubCategory)
                                                                        <li>
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('products', ['id' => $subSubCategory['id'], 'data_from' => 'category', 'page' => 1]) }}">{{ $subSubCategory['name'] }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                                <li class="dropdown">
                                    {{-- <a class="dropdown-item text-capitalize text-center" href="{{ route('categories') }}"
                                        style="color: #FF061E; !important;">
                                        {{ \App\CPU\translate('view_more') }} --}}

                                        <a class="dropdown-item text-capitalize text-center" href="{{ route('products', ['data_from' => 'latest']) }}"
                                        style="color: #FF061E; !important;">
                                        {{ \App\CPU\translate('view_more') }}

                                        <i
                                            class="czi-arrow-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }} __inline-15"></i>
                                    </a>
                                </li>

                            </ul>
                        @else
                            <ul class="dropdown-menu __dropdown-menu-2"
                                style="right: 0; text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};">
                                @foreach ($categories as $category)
                                    <li class="dropdown">
                                        <a class="dropdown-item flex-between <?php if ($category->childes->count() > 0) {
                                            echo "data-toggle='dropdown";
                                        } ?> " <?php if ($category->childes->count() > 0) {
                                            echo "data-toggle='dropdown'";
                                        } ?>
                                            href="javascript:"
                                            onclick="location.href='{{ route('products', ['id' => $category['id'], 'data_from' => 'category', 'page' => 1]) }}'">
                                            <div class="d-flex">
                                                <img src="{{ asset("storage/app/public/category/$category->icon") }}"
                                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                    class="__img-18">
                                                <span
                                                    class="w-0 flex-grow-1 {{ Session::get('direction') === 'rtl' ? 'pr-3' : 'pl-3' }}">{{ $category['name'] }}</span>
                                            </div>
                                            @if ($category->childes->count() > 0)
                                                <div>
                                                    <i
                                                        class="czi-arrow-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }} __inline-15"></i>
                                                </div>
                                            @endif
                                        </a>
                                        @if ($category->childes->count() > 0)
                                            <ul class="dropdown-menu __r-100"
                                                style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};">
                                                @foreach ($category['childes'] as $subCategory)
                                                    <li class="dropdown">
                                                        <a class="dropdown-item flex-between <?php if ($subCategory->childes->count() > 0) {
                                                            echo "data-toggle='dropdown";
                                                        } ?> "
                                                            <?php if ($subCategory->childes->count() > 0) {
                                                                echo "data-toggle='dropdown'";
                                                            } ?> href="javascript:"
                                                            onclick="location.href='{{ route('products', ['id' => $subCategory['id'], 'data_from' => 'category', 'page' => 1]) }}'">
                                                            <div>
                                                                <span
                                                                    class="{{ Session::get('direction') === 'rtl' ? 'pr-3' : 'pl-3' }}">{{ $subCategory['name'] }}</span>
                                                            </div>
                                                            @if ($subCategory->childes->count() > 0)
                                                                <div>
                                                                    <i
                                                                        class="czi-arrow-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }} __inline-15"></i>
                                                                </div>
                                                            @endif
                                                        </a>
                                                        @if ($subCategory->childes->count() > 0)
                                                            <ul class="dropdown-menu __r-100"
                                                                style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};">
                                                                @foreach ($subCategory['childes'] as $subSubCategory)
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('products', ['id' => $subSubCategory['id'], 'data_from' => 'category', 'page' => 1]) }}">{{ $subSubCategory['name'] }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                                <li class="dropdown">
                                    <a class="dropdown-item d-block text-center" href="{{ route('categories') }}"
                                        style="color: {{ $web_config['primary_color'] }} !important;">
                                        {{ \App\CPU\translate('view_more') }}

                                        <i class="czi-arrow-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }} __text-8px"
                                            style="background:none !important;color:{{ $web_config['primary_color'] }} !important;"></i>
                                    </a>
                                </li>
                            </ul>
                        @endif
                    </li>
                </ul>

                {{-- <div class="col col-lg-0 hideMobe"></div> --}}


                <div class="col col-lg-9 col-md-12 col-sm-12">
                    <!-- <div class="innArea"> -->


                    <div class="innerArea4">

                        <div class="row mx-auto">

                            <div class="col col-lg-12 col-md-12 col-sm-12 col-12 bann1 hideDeskMenu" style="margin-bottom: 10px; margin-left: 43px;">
                                <ul  class="navbar-nav nav_float"
                                    style="{{ Session::get('direction') === 'rtl' ? 'padding-right: 0px ' : '' }}">
                                    <li class="nav-item dropdown {{ request()->is('/') ? 'active' : '' }}">
                                        <a class="nav-link navLink fontt"
                                            href="{{ route('home') }}">{{ \App\CPU\translate('Home') }}</a>
                                        {{-- <a class="nav-link" href="{{route('home')}}">{{ \App\CPU\translate('Home')}}</a> --}}
                                    </li>

                                    @if (\App\Model\BusinessSetting::where(['type' => 'product_brand'])->first()->value)
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle navLink fontt" href="#"
                                                data-toggle="dropdown">{{ \App\CPU\translate("Today's Deals") }}</a>
                                            <ul class="dropdown-menu __dropdown-menu-sizing dropdown-menu-{{ Session::get('direction') === 'rtl' ? 'right' : 'left' }} scroll-bar"
                                                style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};">
                                                @foreach (\App\CPU\BrandManager::get_active_brands() as $brand)
                                                    <li class="__inline-17">
                                                        <div>
                                                            <a class="dropdown-item"
                                                                href="{{ route('products', ['id' => $brand['id'], 'data_from' => 'brand', 'page' => 1]) }}">
                                                                {{ $brand['name'] }}
                                                            </a>
                                                        </div>
                                                        <div class="align-baseline">
                                                            @if ($brand['brand_products_count'] > 0)
                                                                <span class="count-value px-2">(
                                                                    {{ $brand['brand_products_count'] }} )</span>
                                                            @endif
                                                        </div>
                                                    </li>
                                                @endforeach
                                                <li class="__inline-17">
                                                    <div>
                                                        <a class="dropdown-item " href="{{ route('brands') }}"
                                                            style="color: {{ $web_config['primary_color'] }} !important;">
                                                            {{ \App\CPU\translate('View_more') }}
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif
                                    @php($discount_product = App\Model\Product::with(['reviews'])->active()->where('discount', '!=', 0)->count())
                                    @if ($discount_product > 0)
                                        <li class="nav-item dropdown {{ request()->is('/') ? 'active' : '' }}">
                                            <a class="nav-link text-capitalize navLink fontt"
                                                href="{{ route('products', ['data_from' => 'discounted', 'page' => 1]) }}">{{ \App\CPU\translate('Trending Products') }}</a>
                                        </li>
                                    @endif

                                    @php($business_mode = \App\CPU\Helpers::get_business_settings('business_mode'))
                                    @if ($business_mode == 'multi')
                                        <li class="nav-item dropdown {{ request()->is('/') ? 'active' : '' }}">
                                            <a class="nav-link navLink fontt"
                                                href="{{ route('sellers') }}">{{ \App\CPU\translate('Special Offers') }}</a>
                                        </li>

                                        @php($seller_registration = \App\Model\BusinessSetting::where(['type' => 'seller_registration'])->first()->value)
                                        @if ($seller_registration)
                                            <li class="nav-item ">
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle NAVFONTHOVER fontt " type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        style="padding-{{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 0">
                                                        {{ \App\CPU\translate('Seller') }}
                                                        {{ \App\CPU\translate('zone') }}
                                                    </button>
                                                    <div class="dropdown-menu __dropdown-menu-3 __min-w-165px"
                                                        aria-labelledby="dropdownMenuButton"
                                                        style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};">
                                                        @if(!auth()->guard('seller')->check())
                                                        <a class="dropdown-item" href="{{ route('shop.apply') }}">
                                                            {{ \App\CPU\translate('Become a') }}
                                                            {{ \App\CPU\translate('Seller') }}
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="{{ route('seller.auth.login') }}">
                                                            {{ \App\CPU\translate('Seller') }}
                                                            {{ \App\CPU\translate('login') }}
                                                        </a>
                                                        @else
                                                            <a class="dropdown-item" href="{{ url('seller/dashboard') }}">
                                                                {{ \App\CPU\translate('Dashboard') }}
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                            @php($main_banner = \App\Model\Banner::where('banner_type', 'Main Banner')->where('published', 1)->orderBy('id', 'desc')->get())
                            @if(count($main_banner) >2)

                            <div class="col col-lg-7 col-md-12 col-sm-12 col-12 bann1">
                                {{-- @foreach ($main_banner as $banner) --}}
                                <div class="d-flex justify-content-center" style="position:relative;">
                                    <div class="img1" style="  background-image:
                                    linear-gradient(90.38deg, rgba(0, 0, 0, 0.6) 2.19%, rgba(0, 0, 0, 0) 82.56%),
                                    url({{ asset('storage/app/public/banner') }}/{{ $main_banner[0]['photo'] }});  background-size: cover;
        background-repeat: no-repeat;
        background-position: top center;">

                                        <div class="innerBody">
                                            <div class="heading">
                                                <h1>Forem ipsum dolor sit</h1>
                                            </div>
                                            <div class="innerText">
                                                <p>Vorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit Nunc vulputate libero et.</p>

                                            </div>
                                            <div class="btnBody">
                                                <a href="{{ route('products', ['data_from' => 'latest']) }}"><button
                                                        class="btnShop">{{ App\CPU\translate('Shop Now') }}</button></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- @endforeach --}}
                            </div>

                            <div class="col col-lg-5 col-md-12 col-sm-12 col-12 bann1">
                                <div class="rightSide">
                                    <div class="img2" style="position: relative;         background-image:
                                     linear-gradient(89.95deg, #1E1E1E -22.83%, rgba(30, 30, 30, 0) 111.11%),
                                    url({{ asset('storage/app/public/banner') }}/{{ $main_banner[1]['photo'] }});
                                background-size: cover;
                                background-repeat: no-repeat;
                                background-position: top center;">


                                        <div class="innerBody2">

                                            <div class="heading2">
                                                <h1>Sorem ipsum dolor</h1>
                                            </div>
                                            <div class="innerText2">
                                                <p>vorem ipsum dolor sit.</p>
                                            </div>
                                            <div class="priceBody2">
                                                {{-- <p>$200 <span>$200</span></p> --}}
                                                <a href="{{ route('products', ['data_from' => 'latest']) }}" class="btnShopBan">{{ App\CPU\translate('Shop Now') }}</a>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="img3" style="position: relative;         background-image:
                                    linear-gradient(90.38deg, rgba(0, 0, 0, 0.6) 2.19%, rgba(0, 0, 0, 0) 82.56%),
                                    url({{ asset('storage/app/public/banner') }}/{{ $main_banner[2]['photo'] }});
                                background-size: cover;
                                background-repeat: no-repeat;
                                background-position: top center;">

                                        <div class="innerBody3">

                                            <div class="heading3">
                                                <h1>Horem ipsum</h1>
                                            </div>
                                            <div class="innerText3">
                                                <p>vorem ipsum dolor sit.</p>
                                            </div>
                                            <div class="priceBody3">
                                                {{-- <p>$200 <span>$200</span></p> --}}

                                                <a href="{{ route('products', ['data_from' => 'latest']) }}" class="btnShopBan">{{ App\CPU\translate('Shop Now') }}</a>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>


                            @elseif(count($main_banner) >1)
                            <div class="col col-lg-7 col-md-12 col-sm-12 col-12 bann1">
                                {{-- @foreach ($main_banner as $banner) --}}

                                    <div class="img1 " style="position:relative;  background-image:
linear-gradient(90.38deg, rgba(0, 0, 0, 0.6) 2.19%, rgba(0, 0, 0, 0) 82.56%),
                                    url({{ asset('storage/app/public/banner') }}/{{ $main_banner[0]['photo'] }});  background-size: cover;
        background-repeat: no-repeat;
        background-position: top center; ">

                                        <div class="innerBody">
                                            <div class="heading">
                                                <h1>Forem ipsum dolor sit</h1>
                                            </div>
                                            <div class="innerText">
                                                <p>Vorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit Nunc vulputate libero et.</p>

                                            </div>
                                            <div class="btnBody">
                                                <a href="{{ route('products', ['data_from' => 'latest']) }}"><button
                                                        class="btnShop">{{ App\CPU\translate('Shop Now') }}</button></a>

                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="col col-lg-5 col-md-12 col-sm-12 col-12 bann1">
                                <div class="rightSide">
                                    <div class="img25" style="position: relative;     background-image:
                                     linear-gradient(89.95deg, #1E1E1E -22.83%, rgba(30, 30, 30, 0) 111.11%),
                                    url({{ asset('storage/app/public/banner') }}/{{ $main_banner[1]['photo'] }});
                                background-size: cover;
                                background-repeat: no-repeat;
                                background-position: top center;">


                                        <div class="innerBody25">

                                            <div class="heading2">
                                                <h1>Sorem ipsum dolor</h1>
                                            </div>
                                            <div class="innerText2">
                                                <p>vorem ipsum dolor sit.</p>
                                            </div>
                                            <div class="priceBody2">
                                                {{-- <p>$200 <span>$200</span></p> --}}
                                                <a href="{{ route('products', ['data_from' => 'latest']) }}" class="btnShopBan">{{ App\CPU\translate('Shop Now') }}</a>

                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>

                            @elseif(count($main_banner) >0)
                            <div class="col col-lg-12 col-md-12 col-sm-12 col-12 bann1">
                                {{-- @foreach ($main_banner as $banner) --}}

                                    <div class="imgOne" style="position:relative;  background-image:
                                   linear-gradient(90.38deg, rgba(0, 0, 0, 0.6) 2.19%, rgba(0, 0, 0, 0) 82.56%),
                                    url({{ asset('storage/app/public/banner') }}/{{ $main_banner[0]['photo'] }});  background-size: cover;
        background-repeat: no-repeat;
        background-position: top center; ">
                                        <div class="innerBody525">
                                            <div class="heading">
                                                <h1>Forem ipsum dolor sit</h1>
                                            </div>
                                            <div class="innerText">
                                                <p>Vorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit Nunc vulputate libero et.</p>

                                            </div>
                                            <div class="btnBody">
                                                <a href="{{ route('products', ['data_from' => 'latest']) }}"><button
                                                        class="btnShop">{{ App\CPU\translate('Shop Now') }}</button></a>

                                            </div>
                                        </div>
                                    </div>
                            </div>

                            @else

                            @endif
                        </div>
                    </div>
                    <!-- </div> -->




                </div>
            </div>

        </div>


        </div>

        <br><br>

        <div class="container px-auto">
            <div class="row mx-auto">

                <div class="col-9 px-0">
                    <h1 class="shopHeading">{{ \App\CPU\translate('Shop Our Top Categories') }}</h1>
                </div>
                <div class="col-3 px-0">
                    <div class="innea5">
                        <a class=" viewBtn" href="{{ route('products', ['data_from' => 'latest']) }}">{{ \App\CPU\translate('View All') }} ></i></a>

                    </div>

                </div>

            </div>
        </div>


        <br><br>
        <div class="container">
            <div class="cardsContainer d-flex justify-content-center ">
                <div class="row">

                    <div class="col-12">
                        <div class="innerArea6">
                            <div class="inner1 cardOne">
                                @foreach ($categories as $key => $category)
                                    @if ($key < 6)

                                            <a
                                                href="{{ route('products', ['id' => $category['id'], 'data_from' => 'category', 'page' => 1]) }}">
                                                <div class="inner2">
                                                    <div class="card"
                                                        style=" background: linear-gradient(to bottom, rgba(245, 246, 252, 0.048), rgba(0, 0, 0, 0.5)), url({{ asset("storage/app/public/category/$category->icon") }}); ">
                                                        {{-- <img onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                            src="c"
                                                            alt="{{ $category->name }}"> --}}
                                                        <h2 class="cardText1">{{ Str::limit($category->name, 12) }}</h2>
                                                    </div>
                                                </div>
                                            </a>

                                    @endif
                                @endforeach
                            </div>
                        </div>

                    </div>


                </div>


            </div>
        </div>


        <br><br><br>

        <div class="container px-auto">
            <div class="row mx-auto">
                <div class="col-12">
                    <h1 class="shopHeading">{{ \App\CPU\translate('Flash Sales') }}</h1>
                    {{-- <br> --}}
                    <div class="innerArea6">
                        <div class="inner1 cardOne">
                            @foreach ($latest_products as $key => $product)
                                @if ($key < 4)

                                            <div class="inner122">

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
                                                                        <a href="{{route('product',$product->slug)}}">
                                                                        <img class="__img-125px"
                                                                            src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $product['thumbnail'] }}"
                                                                            onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="flash_deal_product_details"  style="width: 100%">
                                                                    <div class="d-flex mt-4">
                                                                        <div>
                                                                            <span class="flash-product-title" style="color: #000;
                                                                            font-size: 26px;
                                                                            font-weight: 600;
    font-family: 'BURBANKBIGCONDENSED-BOLD' !important;">
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


                                                                                        style=" font-size: 18px!important; color: #1E1E1E99; !important; font-weight:700;    text-decoration: line-through;
                                                                                        text-decoration-color: red; text-decoration-thickness:1.5px;
                                                                                        font-family: 'BURBANKBIGCONDENSED-BOLD' !important;">
                                                                                        {{ \App\CPU\Helpers::currency_converter($product->unit_price) }}
                                                                                    </p>
                                                                                @endif
                                                                            </div>
                                                                            <div class="flash-product-price">

                                                                                <p style="
    font-family: 'BURBANKBIGCONDENSED-BOLD' !important;

                                                                                color: red;
                                                                                font-size: 30px;
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

                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <br><br>
        <div class="container px-auto">
            <div class="row mx-auto">
                <div class="col-12">
                    <div class="innerArea7">

                        @php($promo_banner = \App\Model\Banner::where('banner_type', 'Promo Banner')->where('published', 1)->orderBy('id', 'desc')->latest()->first())
                        @if (isset($promo_banner))
                            <div class="img22" style="background: linear-gradient(to left, rgb(42 42 42 / 52%), rgba(0, 0, 0, 1.5)), url({{ asset('storage/app/public/banner') }}/{{ $promo_banner['photo'] }});    background-position: center;
                            background-size: cover;">
                                {{-- <img class=""
                                    src="{{ asset('storage/app/public/banner') }}/{{ $main_section_banner['photo'] }}"> --}}
                                <div class="innText">
                                    <p class="redText">Lorem Ipsum</p>
                                    <h1 class="whiteHeading">Sorem ipsum dolor sit amet elit.</h1>
                                    <p class="whiteText">Dorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <button class="shop">
                                        <a href="{{ route('products', ['data_from' => 'latest']) }}">
                                            {{ App\CPU\translate('Shop Now') }} </a></button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="container px-auto">
            <div class="row mx-auto">
                <div class="col-12">
                    <h1 class="shopHeading">{{ \App\CPU\translate('Trending Products') }}</h1>
                    {{-- <br> --}}
                    <div class="innerArea6">
                        <div class="inner1 cardOne">
                            @foreach ($latest_products as $key => $product)
                                @if ($key < 4)

                                            <div class="inner122">

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

                                                                        <a href="{{route('product',$product->slug)}}">

                                                                        <img class="__img-125px"
                                                                            src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $product['thumbnail'] }}"
                                                                            onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />
                                                                        </a>

                                                                        </div>
                                                                </div>
                                                                <div
                                                                    class="flash_deal_product_details" style="width: 100%">
                                                                    <div class="d-flex mt-4">
                                                                        <div>
                                                                            <span class="flash-product-title" style="

                                                                            font-family: 'BURBANKBIGCONDENSED-BOLD' !important;

                                                                            color: #000;
                                                                            font-size: 26px;
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
                                                                                    style="
                                                                                        font-family: 'BURBANKBIGCONDENSED-BOLD' !important;

                                                                                    font-size: 18px!important; color: #1E1E1E99; !important; font-weight:700;    text-decoration: line-through;
                                                                                    text-decoration-color: red; text-decoration-thickness:1.5px;">
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>

                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </div>
        <br><br><br>

        <div class="container px-auto">
            <div class="row">
                <div class="col-12">
                    <div class="innerArea5">
                        <h1 class="shopHeading">{{ App\CPU\translate('Today’s Deals') }}</h1>
                    </div>
                </div>
            </div>
        </div>


        <br>
        <div class="container px-auto">
            <div class="innerArea6">
                <div class="inner1">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 px-0">
                            <div class="">


                                @php($todayLeft = \App\Model\Banner::where('banner_type', 'Today Banner Left')->where('published', 1)->orderBy('id', 'desc')->take(3)->get())
                                {{-- @foreach ( as $banner) --}}

                                @if(count($todayLeft) > 0)
                                    <div class="leftImg">
                                        <a href="{{ $todayLeft[0]->url }}" class="d-block">
                                            <img
                                                src="{{ asset('storage/app/public/banner') }}/{{ $todayLeft[0]['photo'] }}">
                                        </a>
                                    </div>
                                    @endif
                                {{-- @endforeach --}}
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 px-0">
                            <div class="middleArea mx-4 my-10">
                                <label class="dealOfTheDay" for="dealOfTheDay" style="font-family:'Poppins' !important; color:#fff;">Deal Of Day</label>
                                <h1 class="middleHeading">Vorem ipsum dolor
                                    sit amet, consectetur</h1>
                                <label class="price1" for="price1">$999.99</label>
                                <h2 class="price2">$599</h2>
                                <p class="middleText">
                                    Korem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie,
                                    dictum
                                    est a, mattis
                                    tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut
                                    interdum tellus
                                    elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent
                                    taciti sociosqu
                                    ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent auctor purus
                                    luctus
                                    enim
                                    egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse ac rhoncus nisl,
                                    eu
                                    tempor urna.
                                    Curabitur vel bibendum lorem. Morbi convallis convallis diam sit amet lacinia. Aliquam
                                    in
                                    elementum
                                    tellus.
                                </p>
                            </div>
                        </div>
                        @php($todayRight = \App\Model\Banner::where('banner_type', 'Today Banner Right')->where('published', 1)->orderBy('id', 'desc')->take(3)->get())

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 px-1">

                            @if(count($todayRight) > 1)
                            <div class="topImg" style="background: linear-gradient(to bottom, rgb(42 42 42 / 52%), rgba(0, 0, 0, 0.5)), url({{ asset('storage/app/public/banner') }}/{{ $todayRight[0]['photo'] }});  background-position: center;
                            background-size: cover;">

                                <h2 class="imageText">Vorem ipsum dolor
                                    sit amet, consectetur</h2>
                            </div>
                            <div class="bottomImg" style="background: linear-gradient(to bottom, rgb(42 42 42 / 52%), rgba(0, 0, 0, 0.5)), url({{ asset('storage/app/public/banner') }}/{{ $todayRight[1]['photo'] }});  background-position: center;
                            background-size: cover;">

                                <h2 class="imageText">Vorem ipsum dolor
                                    sit amet, consectetur</h2>
                            </div>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <br><br>

        <div class="container px-auto mx-auto">
            <div class="row mx-auto">
                <div class="col-12">
                    <h1 class="shopHeading">{{ App\CPU\Translate('For You') }}</h1>
                    <div class="innerArea6">
                        <div class="inner1 cardOne forYOU">
                            @foreach ($latest_products as $key => $product)
                                @if ($key < 12)

                                            <div class="inner122">

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
                                                                        <a href="{{route('product',$product->slug)}}">
                                                                        <img class="__img-125px"
                                                                            src="{{ \App\CPU\ProductManager::product_image_path('thumbnail') }}/{{ $product['thumbnail'] }}"
                                                                            onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'" />

                                                                        </a>
                                                                        </div>
                                                                </div>

                                                                <div class="flash_deal_product_details" style="width: 100%">
                                                                    <div class="d-flex mt-4">
                                                                        <div>
                                                                            <div>
                                                                                <span class="flash-product-title"

                                                                                style="
                                                                                font-family: 'BURBANKBIGCONDENSED-BOLD' !important;
                                                                                color: #000;
                                                                                font-size: 26px;
                                                                                font-weight: 600;">
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

                                                                        <div class="d-flex" style="width: 27%;">
                                                                            <div>
                                                                                @if ($product->discount > 0)
                                                                                    <p
                                                                                    style="
                                                                                        font-family: 'BURBANKBIGCONDENSED-BOLD' !important;

                                                                                    font-size: 18px!important; color: #1E1E1E99; !important; font-weight:700;    text-decoration: line-through;
                                                                                    text-decoration-color: red; text-decoration-thickness:1.5px;">
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                </div>

                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <br><br>

        <div class="container px-auto">
            <div class="row mx-auto">
                <div class="col-12">
                    <div class="innerArea9">
                        <a href="{{ route('products', ['data_from' => 'latest']) }}"><button class="loadMore">
                                Load More
                            </button></a>
                    </div>

                </div>
            </div>
        </div>


        <br><br>
        </div>


    @endsection
</body>

</html>

<style>
    .NAVFONTHOVER:hover{

        color: #FF061E !important;
        opacity: 1 !important;


    }
    @font-face {
    font-family: 'BURBANKBIGCONDENSED-BOLD';
    src: url({{ asset('public/assets/front-end/fonts/BURBANKBIGCONDENSED-BOLD.ttf')}});

}
@font-face {
    font-family: 'BURBANKBIGCONDENSED-BLACK';
    src: url({{ asset('public/assets/front-end/fonts/BURBANKBIGCONDENSED-BLACK.ttf')}});

}
.fontt{
    font-family: 'BURBANKBIGCONDENSED-BOLD' !important;
    font-style: normal;
    color: #000 !important;
font-weight: 600 !important;
font-size: 23.2274px !important;
}

.fontt2{
    font-family: 'BURBANKBIGCONDENSED-BOLD' !important;
font-weight: 600 !important;
font-size: 20px !important;
letter-spacing: 1px;
}
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

    .innerArea {
        background: #000;
        height: 40px;
        display: flex !important;
        color: #fff;

    }

    .nav_float {
        flex-direction: row !important;
        align-items: center;
    }

    .nav_float li {
        margin: 10px 15px;
    }

    .nav-item .dropdown-toggle::after {
        margin-left: 8px !important;
    }

    .Mid {
        margin: 8px 10px;

    }

    .bann1 {
        padding-right: 0 !important;
        padding-left: 0 !important;
    }

    .cont1 {
        color: #fff;
        /* margin: 10px 10px; */
        width: 50%;

    }

    .forYOU{
        flex-wrap: wrap;
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

    /* .innerArea4 {
        display: inline-flex;

    } */

    .innerArea4 .img1 {

        width: 484px;
        height: 380px;
        /* margin-left: 35px; */


        border-radius: 15px;

    }

    .innerArea4 .imgOne {
        background-image:
            linear-gradient(to left, rgba(245, 246, 252, 0.52), rgba(0, 0, 0, 0.5)),
            url('pg11.jpg');
        width: 805px;
        height: 380px;
        /* margin-left: 35px; */
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top center;

        border-radius: 15px;

    }

    .rightSide .innerBody2 .priceBody2 .btnShopBan ,     .rightSide .innerBody3 .priceBody3 .btnShopBan{

        background: #FF061E;
        color: #fff;
        padding: 5px 10px;
        font-size: 12px;
        text-decoration: none;


}
.rightSide .innerBody25 .priceBody2 .btnShopBan {

background: #FF061E;
color: #fff;
padding: 5px 10px;
font-size: 12px;
text-decoration: none;

}

    .innerArea4 .innerBody .heading h1 {
    font-family: 'BURBANKBIGCONDENSED-BOLD' !important;

        font-size: 35px;
        color: #FFF;
        font-weight: 600;
    }

    .innerArea4 .innerBody .innerText p {
        font-size: 14px;
        color: #fff;

    }

    .innerArea4 .innerBody .btnBody .btnShop {
        background-color: #EC0000;
        color: #fff;
        width: 116px;
        height: 33.02px;
        border: none;
    }
    .innerArea4 .innerBody525 .heading h1 {
        font-size: 35px;
        color: #FFF;
        font-weight: 600;
    }

    .innerArea4 .innerBody525 .innerText p {
        font-size: 14px;
        color: #fff;

    }

    .innerArea4 .innerBody525 .btnBody .btnShop {
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

    .innerArea4 .innerBody2 {
        position: absolute;
        top: 15px;
        left: 35px;
    }

    .innerArea4 .innerBody3 {
        position: absolute;
        top: 55px;
        left: 35px;
    }

    .innerArea4 .innerBody2 .heading2 h1 {
    font-family: 'BURBANKBIGCONDENSED-BOLD' !important;

        font-size: 30px;
        color: #FFF;
        width: 70%;
        font-weight: 600;
    }

    .innerArea4 .innerBody2 .innerText2 p {
        color: #fff;
        font-size: 15px;
    }

    .innerArea4 .innerBody25 .heading2 h1 {
        font-size: 30px;
        color: #FFF;
        width: 70%;
        font-weight: 600;
    }

    .innerArea4 .innerBody25 .innerText2 p {
        color: #fff;
        font-size: 15px;
    }
    .innerArea4 .innerBody2 .priceBody2 p {

        font-size: 30px;
        color: #EC0000;
        font-weight: 600;
        margin-top: -10px;
    }

    .innerArea4 .innerBody2 .priceBody2 p span {
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

    .innerArea4 .innerBody3 .heading3 h1 {
    font-family: 'BURBANKBIGCONDENSED-BOLD' !important;

        font-size: 30px;
        color: #FFF;
        width: 100%;
        font-weight: 600;
    }

    .innerArea4 .innerBody3 .innerText3 p {
        color: #fff;
        font-size: 15px;
    }

    .innerArea4 .innerBody3 .priceBody3 p {

        font-size: 30px;
        color: #EC0000;
        font-weight: 600;
        margin-top: -10px;
    }

    .innerArea4 .innerBody3 .priceBody3 p span {
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

    .innerArea4 .innerBody {
        position: absolute;
        top: 0;
        left: 20px
    }
    .innerArea4 .innerBody525 {
        position: absolute;
        top: 55%;
        left: 20px
    }

    .innerArea6 {

        width: 100%;
    }

    .innerArea6 .inner1 {
        display: flex;
        justify-content: center;

    }

    .innerArea6 .inner1 .inner2 .card {

        width: 200px;
        height: 240px;
        background-position: center !important;
        background-size: cover !important;
        border-radius: 15px;
        /* margin: 5px; */

    }


    .innerArea6 .inner1 .cardText1 {
        text-transform: capitalize;
        color: #fff;
        position: absolute;
        /* margin-top: -45px; */
        text-align: center;
        /* margin-left: 40px; */

        top: 170px;
        left: 35px;
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

    /* .innerArea6 .inner1 .inner2::before {

        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);


    } */

    .innerArea6 .inner1 .inner2 .card {
        /* overflow: hidden; */
        transform-origin: 65% 75%;
        transition: transform 1s, filter .3s ease-out;

    }

    .innerArea6 .inner1 .inner2 .card:hover {
        transform: scale(1.1);

    }



    .innerArea7 {
        display: flex;
        justify-content: center;
    }

    .innerArea7 .img22 {

        width: 1250px;
        height: 375px;

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
        font-family: 'BURBANKBIGCONDENSED-BOLD' !important;

        color: #fff;
        font-size: 55px;
        font-weight: 600;
        line-height: 1;

    }

    .innerArea7 .img22 .innText .whiteText {
        color: #fff;
        font-size: 16px;
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
    .innerArea7 .img22 .innText .shop a{
        color: #fff;
        text-decoration: none;

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

    /* .innerArea8 .inn2 .leftImg img {
        width: 430px;
        height: 856px;
        object-fit: cover;
        border-radius: 15px;

    } */

    .innerArea8 .inn2 .rightArea {
        margin-top: 0px;
    }

    .topImg {

        width: 430px;
        height: 414px;

        border-radius: 15px;
        margin-bottom: 20px;
        position: relative;
    }

    .bottomImg {
        width: 430px;
        height: 414px;

        border-radius: 15px;
        margin-top: 20px;
        position: relative;

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
        font-family: 'BURBANKBIGCONDENSED-BOLD' !important;
        font-size: 49px;
        font-weight: 600 !important;
    }

    .middleArea .price1 {
        font-family: 'BURBANKBIGCONDENSED-BOLD' !important;

        color: #777;
        font-size: 20px;
        line-height: 0;
        text-decoration: line-through;
        text-decoration-color: #EC0000;

    }

    .middleArea .price2 {
        font-family: 'BURBANKBIGCONDENSED-BOLD' !important;

        font-size: 50px;
        font-weight: 600;
        color: #EC0000;
        line-height: 0;
        margin-top: 25px;

    }

    .middleArea .middleText {
        margin-top: 50px;
        font-size: 16px;
    }

    .imageText {

        font-family: 'BURBANKBIGCONDENSED-BOLD' !important;
        color: #fff;
        position: absolute;
        top: 60%;
        left: 20px;
        font-size: 46px;
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


    @media screen and (max-width:480px) {
        .bann1{
            margin-left: 0 !important;
        }
        .comp3 {
            margin-left: 0px;
        }

        .comp2 {
            margin-left: 0px;
        }

        .comp1 {
            margin-left: 10px;
        }

        .hideDeskMenu{
            display: none;
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


        .innerArea7 .img22 .innText {
            margin-top: 135px !important;
            margin-left: 35px;
        }

        .socialIcons {
            display: flex;
            justify-content: center;
            margin: 10px;
        }

        .textFoot {
            font-size: 8px;
        }


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
        margin: 180px 20px;
        width: 80%
    }


    /* .rightSide {
        margin-left: 225px;
    } */

    .innerArea4 .img2 .innerBody2 {
        position: absolute;
        /* margin: 15px 0px; */
        width: 80%;
    }

    .flash_deal_product{
        height: 412px !important;
    }
    .innerArea6 .inner1 .inner122{
        width: 310px;
        overflow: hidden;
    border-radius: 15px;
    vertical-align: middle;
    margin: 0px 10px;
    position: relative;
    }
    .__img-125px{
        width: 327px !important;
    }
    .innerArea4 .img3 .innerBody3 {
        position: absolute;
        top: 25%;
        /* margin: 45px 15px; */
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
        width: 353px;
        height: 185px;

        margin: 10px 10px;
        border-radius: 15px;
    }

    .innerArea4 .img2 {

        width: 353px;
        height: 185px;

        margin: 0 10px;
        border-radius: 15px;
    }

    .innerArea4 .img25 {

        width: 330px;
        height: 380px;

        margin: 0 10px;
        border-radius: 15px;
    }

    .innerArea4 .innerBody25{
        position: absolute;
    top: 195px;
    left: 35px;
    }
    .shopHeading {
        font-family: 'BURBANKBIGCONDENSED-BOLD' !important;
    font-style: normal;
   font-weight: 600 !important;
   font-size: 44px !important;
   margin-bottom: 32px;
    }

    .innea5 {
        position: relative;
    }

    .innea5 .viewBtn {
        position: absolute;
        top: 45px;
        left: 220px;
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
        margin-right: 0 !important;
        margin-left: 0 !important;
    }

    .leftImg img {
        width: 450px;
        height: 850px;
        object-fit: cover;
        border-radius: 20px;
    }

    .underLine:hover{
        text-decoration: none;
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
            width: auto;

        }

        .bottomImg {
            width: auto;
        }

        .imageText {
            /* margin-top: 210px; */
        }
    }

    /* Tablet CSS HOME */

    @media screen and (max-width: 825px) {

        .bann1{
            margin-left: 0 !important;
        }
        .nav_float .nav-link {
            font-size: 12px;
        }

        .nav_float .nav-item .dropdown  {
            font-size: 12px !important;

        }

        .innerr {
            display: none;
        }

        .rightSide {
            display: flex;
            /* margin-left: 0; */
            margin: 2px 2px;
            justify-content: center;

        }

        .img1 {
            width: 660px !important;
            height: 438px !important;
            margin: 2px 7px;

        }

        .innerArea4 .imgOne{
            width: 660px !important;
            height: 438px !important;
            margin: 2px 7px;

        }
        .cardTwo {
            margin-right: 0px;
        }

        .cardThree {
            margin-right: 0px;
        }
        .innerArea4 .img25{
        margin: 0;
        width: 660px;
    }
    .innerArea4 .innerBody25{
        top: 160px;
    }
    .innerArea4 .innerBody25 .heading2 h1{
        width: 100%;
        font-size: 35px;

    }
    .rightSide .innerBody25 .priceBody2 .btnShopBan{
        padding: 8px 27px;
    font-size: 13px;
    }
        .innerArea4 .img2 {
            margin: 0 2px;
            width: 330px !important;

        }

        .innerArea4 .img3 {
            width: 330px !important;
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
            width: auto;
            height: 360px;
        }

        .bottomImg {
            width: auto;
            height: 360px;
        }

        .imageText {
            /* margin-top: 115px; */
            font-size: 25px;

        }

        /* .innerArea4 .img1 {
            margin-left: 0px;
        } */
    }




    /* Mobile CSS HOME */
    @media screen and (max-width: 425px) {

        .nav_float {
            flex-wrap: wrap;
            justify-content: center;
        }

        .nav_float li {
            margin: 5px 10px;
        }

        .nav_float li a {
            font-size: 9px;
        }

        .nav_float .nav-item .dropdown  {
            font-size: 9px !important;

        }

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
            align-items: center;

        }

        .innerArea6 .inner1 .inner2{
            width:332px;
        }
        .innerArea6 .inner1 .inner2 .card{
            width: 320px;
            height: 312px;
        }
        .img1 {
            width: 315px !important;
            height: 213px !important;
            margin: 2px 0px;
        }

        .innerArea4 .imgOne {
            width: 315px !important;
            height: 213px !important;
            margin: 2px 0px;
        }

        /* .innerArea4 .img1 {
            margin-left: 0;
        } */
        .innerArea4 .img25{
            width: 315px !important;
            height: 213px !important;
            margin: 2px 0px;

        }

        .innerArea4 .innerBody25 .heading2 h1{
            font-size: 25px;
        }
        .innerArea4 .img3 .innerBody3{
            top: 15%;

        }
        .innerArea4 .innerBody25{
            top: 55px;
            left: 25px;

        }
        .rightSide .innerBody25 .priceBody2 .btnShopBan{
            padding: 7px 18px;

        }
        .innerArea4 .img1 .innerBody {

            margin: 0px 10px;
        }

        .innerArea4 .img2 {
            width: 315px !important;
            margin: 2px 0px;
        }

        .innerArea4 .img3 {
            width: 315px !important;

            margin: 2px 0px;
        }

        .innerArea4 .img1 .innerBody .heading h1 {
            font-size: 25px;
        }
        .innerArea4 .imgOne .innerBody525 .heading h1 {
            font-size: 25px;
        }
        .innerArea4 .innerBody525{
            top: 20%;
        }

        .innerArea4 .innerBody525 .btnBody .btnShop{
            width: 90px;
            height: 27px;
        }
        /* .innerArea4 .img2 .innerBody2 {
            margin: 50px 15px;
        } */

        .innerArea4 .img2 .innerBody2 .heading2 h1 {
            font-size: 25px;
        }

        .innerArea4 .innerBody {
            top: 0;
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
            top: 20px;
            left: 0px
        }

        .innerArea6 .inner1 {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .innerArea6 .inner1 .cardText1 {

            top: 212px;
            left: 75px;
            font-size: 35px !important;
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

        .flash_deal_product{

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
            font-size: 12px;

        }

        .topImg {
            width: auto;
            height: 250px;
        }

        .bottomImg {
            width: auto;
            height: 250px;
        }

        .imageText {

            top: 100px;

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
