    <style>
    @font-face {
        font-family: 'BURBANKBIGCONDENSED-BOLD';
        src: url({{ asset('public/assets/front-end/fonts/BURBANKBIGCONDENSED-BOLD.ttf') }});

    }

    .for-count-value {
        color: {{ $web_config['primary_color'] }};
    }

    .count-value {
        color: {{ $web_config['primary_color'] }};
    }

    .nav_float {
        float: right !important;
        font-weight: bold;
        font-size: 16.2274px;

        letter-spacing: 0.02em;

    }

    .searchBTN {
        background: #FF061E !important;
        right: 10px !important;

    }


    .mega-nav .dropdown-menu>.dropdown>a {
        padding: 2rem 0.5rem;
        font-size: 15px;
        font-weight: 500;
        color: #2C2B2B99;
    }

    .paraentDrop>.childDrop:hover {
        color: #FF061E !important;

    }

    .topbar {
        padding: 1rem 0;
        font-size: 1.2rem;
        /* background: #000; */
        background: #151515;

        color: #FFF;

    }

    .topbar a {
        color: #FFF !important;

    }

    .leftDiscount {
        width: 45%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-right: 1px solid #fff;
        padding-right: 10px;

    }

    .leftDiscount .discount50 h4 {
        font-size: 15px !important;
        color: #FFF;

    }

    .rightTop {
        width: 52%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .shoppy {
        font-size: 15px;
        font-weight: 500;
        padding-top: 6px;
    }

    .saleLocation {
        width: 40%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .saleLocation h4 {
        color: #FFF;
        font-size: 15px !important;

    }

    .navbar-stuck-menu>.container {
        padding: 5px 0px !important;
    }

    .categoryNav {
        background: none !important;
    }

    .toggleCat {
        background: #FF061E !important;

    }

    .navLink {
        color: #000 !important;
    }

    .navLink1 {
        padding-left: 5px !important;
        color: #000 !important;
        font-size: 16.2274px !important;
        font-weight: 600 !important;
    }

    .navLink1:hover {
        color: #FF061E !important;
        opacity: 1 !important;

    }

    .navLink:hover {
        color: #FF061E !important;
        /* opacity: 1 !important; */

    }

    .navbar-expand-md .navbar-nav .nav-item>a:hover {
        opacity: 1 !important;
    }

    .loca {
        padding-top: 8px;
    }

    .dropMenu {
        background: #000 !important;
    }

    .searchBar {
        display: flex;
        flex-direction: row;
        width: 90%;
    }

    .searchCate {
        background: rgba(0, 0, 0, 0) !important;
        color: #777 !important;
        border: none;
        border-left: 1px solid #7777 !important;
        border-top: 1px solid #7777 !important;
        border-bottom: 1px solid #7777 !important;
        padding: 1.45rem 3rem !important;
        border-radius: 0px;
        font-size: 14px;
    }

    .input-group-text {
        padding: 1.45rem 1.39rem !important;
        font-size: 2rem !important;

    }

    .form-control {
        padding: 2.5rem 1rem !important;
        border: 1px solid #7777 !important;
        border-radius: 0.8rem !important;
        box-shadow: none !important;
        font-size: 14px;


    }

    .navbar {
        margin-bottom: 5px !important;
        margin-top: 5px !important;

    }

    .navBarHeight {
        padding: 5px 0px 10px 0px;
    }

    .navAccount {
        font-family: 'BURBANKBIGCONDENSED-BOLD' !important;
        font-size: 24px;
        font-weight: 800;
        padding: 2px;
    }

    .navAccount:hover {
        color: #FF061E !important;
    }

    .navAccount:hover svg path {
        fill: #FF061E !important;
    }

    .navCart {
        font-size: 18px;
        font-weight: 800;
        padding: 2px;
    }

    .navbar-brand{
        height: 67px;
        padding: 0px 15px !important;


    }
    .newDIV{
        margin: 0px !important;
    }
    .navCart a:hover {
        color: #FF061E !important;
        cursor: pointer;
        text-decoration: none;
        background-color: white !important;
    }

    .navCart a {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        width: 100%;
        color: black;
        transition: inherit !important;
        background-color: white !important;
    }

    .navCart a:hover svg path {
        fill: #FF061E !important;


    }

    /* .searchBTN {
        right: 75px !important;
    } */


    @media screen and (max-width:992px) {

        .cartAcc {
            flex-wrap: wrap !important;
        }

        .searchBar {
            width: 100%;
        }

        .searchBTN {
            right: -25px !important;
        }

        .leftDiscount {
            /* flex-direction: column; */
            flex-wrap: wrap;
        }

        .saleLocation {
            width: 58%;
        }
    }

    @media (min-width: 768px) {
        .navbar-stuck-menu {
            background-color: {{ $web_config['primary_color'] }};
        }


    }

    @media (max-width: 767px) {
        .search_button .input-group-text i {
            color: {{ $web_config['primary_color'] }} !important;
        }

        .navbar-expand-md .dropdown-menu>.dropdown>.dropdown-toggle {
            padding- {{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}: 1.95rem;
        }

        .mega-nav1 {
            color: {{ $web_config['primary_color'] }} !important;
        }

        .mega-nav1 .nav-link {
            color: {{ $web_config['primary_color'] }} !important;
        }

        /* .leftDiscount {
            flex-direction: column;
            flex-wrap: wrap;
        } */

        .navAccount {
            font-size: 12px;
        }

        .searchBTN {
            right: 25px !important;
        }

        .searchCate {
            padding: 1.45rem 1rem !important;
        }

        .innerArea7 .img22 {
            width: 757px;
        }

        .innerArea7 .img22 .innText {
            margin-left: 30px;
        }

        .navCart {
            font-size: 12px;
        }

        .innerArea7 .img22 {
            width: 757px;
        }

        .innerArea7 .img22 .innText {
            margin-left: 30px;
        }

        .searchBTN {
            right: 25px !important;
        }

        .leftDiscount {
            flex-direction: column;
            align-items: initial;
        }

        .cartAcc {
            flex-wrap: nowrap !important;
        }

        .navCart {
            font-size: 12px;
        }

        .navAccount {
            font-size: 12px;
        }

        .saleLocation {
            width: 58%;
        }

        .searchCate {
            padding: 1.45rem 1rem !important;
        }

        .saleLocation {
            width: 58%;
        }
    }

    @media (max-width: 471px) {
        .mega-nav1 {
            color: {{ $web_config['primary_color'] }} !important;
        }

        .mega-nav1 .nav-link {
            color: {{ $web_config['primary_color'] }} !important;
        }

        .leftDiscount {
            flex-direction: column;

        }

        .leftDiscount .discount50 h4 {
            font-size: 9px !important;
        }

        .saleLocation {
            flex-direction: column-reverse;
            width: 75%;
            align-items: flex-end;
        }

        .saleLocation h4 {
            font-size: 8px !important;
        }

        .topbar a {
            font-size: 9px;
        }

        .locaDiv {
            font-size: 11px !important;
            padding: 0 !important;
            /* padding: 3px 0px !important; */
        }

        /* .rightTop{
            align-items: flex-end;
    flex-direction: column;
        } */
    }
</style>
@php($announcement = \App\CPU\Helpers::get_business_settings('announcement'))
@if (isset($announcement) && $announcement['status'] == 1)
    <div class="text-center position-relative px-4 py-1" id="anouncement"
        style="background-color: {{ $announcement['color'] }};color:{{ $announcement['text_color'] }}">
        <span>{{ $announcement['announcement'] }} </span>
        <span class="__close-anouncement" onclick="myFunction()">X</span>
    </div>
@endif


<header class="box-shadow-sm rtl __inline-10">
    <!-- Topbara-->
    <div class="topbar">
        <div class="container">

            <div class="leftDiscount">
                <div class="topbar-text dropdown d-md-none ">
                    <a class="topbar-link" href="tel: {{ $web_config['phone']->value }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                            class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg>
                        {{ $web_config['phone']->value }}

                    </a>
                </div>
                <div class="d-none d-md-block {{ Session::get('direction') === 'rtl' ? 'mr-2' : 'mr-2' }} text-nowrap">
                    <a class="topbar-link d-none d-md-inline-block" href="tel:{{ $web_config['phone']->value }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                            class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg> {{ $web_config['phone']->value }}
                    </a>
                </div>
                <div class="discount50">

                    <h4>Get 50% Off on Selected items</h4>

                </div>
            </div>

            {{-- | --}}

            <div class="rightTop">

                <div class="shoppy">

                    <p><a href="{{ route('products', ['data_from' => 'latest']) }}">Shop Now</a></p>

                </div>


                @php($currency_model = \App\CPU\Helpers::get_business_settings('currency_model'))

                @php($local = \App\CPU\Helpers::default_lang())

                <div class="saleLocation">
                    <h4>Sell On Remise</h4>

                </div>

            </div>
        </div>
    </div>



    <div class="navbar-sticky bg-light mobile-head">

        <div class="divIn newDIV">
            <div class="modalOuter" style="display: flex;
            align-items: center;">
                <div class="modalDiv">

                    <button style="border: 1px solid; margin-top:10px; margin-right:5px;" type="button" class="btn btnModal" data-toggle="modal" data-target="#navModal">

                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                          </svg>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="navModal" tabindex="-1" role="dialog" aria-labelledby="navModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="navModalLabel">Menu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
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
                                                            <a class="dropdown-item" href="{{ route('shop.apply') }}">
                                                                {{ \App\CPU\translate('Become a') }}
                                                                {{ \App\CPU\translate('Seller') }}
                                                            </a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="{{ route('seller.auth.login') }}">
                                                                {{ \App\CPU\translate('Seller') }}
                                                                {{ \App\CPU\translate('login') }}
                                                            </a>

                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                                </div>

                            </div>
                        </div>
                                    </div>
                </div>
            <div>


                </div>
            </div>
    </div>


        {{-- New Navbar --}}

        <div class="navbar navbar-expand-md navbar-light navBarHeight">
            <div class="container " style="display:block !important;">
                {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}


                {{-- Desktop Logo --}}
                <div class="row" style="align-items: center;">

                    <div class="col-3">
                        <a class="navbar-brand d-none d-sm-block  {{ Session::get('direction') === 'rtl' ? 'mr-3' : 'mr-3' }} flex-shrink-0 __min-w-7rem"
                            href="{{ route('home') }}">
                            <img class="__inline-11"
                                src="{{ asset('storage/app/public/company') . '/' . $web_config['web_logo']->value }}"
                                onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                alt="{{ $web_config['name']->value }}" />
                        </a>

                        {{-- Mobile Logo --}}
                        <a class="navbar-brand d-sm-none {{ Session::get('direction') === 'rtl' ? 'mr-2' : 'mr-2' }}"
                            href="{{ route('home') }}">
                            <img class="mobile-logo-img __inline-12"
                                src="{{ asset('storage/app/public/company') . '/' . $web_config['mob_logo']->value }}"
                                onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                alt="{{ $web_config['name']->value }}" />
                        </a>

                    </div>

                    <!-- Search-->


                    <div class="col-6">
                        <div class="input-group-overlay d-none d-md-block mt-4" style="text-align: -webkit-auto;">
                            <form action="{{ route('products') }}" type="submit" class="search_form searchBar">
                                <input class="form-control appended-form-control search-bar-input" type="text"
                                    autocomplete="off" placeholder="{{ \App\CPU\translate('Search Product ...') }}"
                                    name="name">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle searchCate" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        All Categories
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @foreach (App\Model\Category::orderBy('name')->get() as $category)
                                            <a class="dropdown-item" href="#">{{ $category->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <button class="input-group-append-overlay search_button searchBTN" type="submit"
                                    style="border-radius: {{ Session::get('direction') === 'rtl' ? '7px 0px 0px 7px; right: unset; left: 0' : '0px 7px 7px 0px; left: unset; right: 0' }};top:0">
                                    <span class="input-group-text __text-20px">
                                        <i class="czi-search text-white"></i>
                                    </span>
                                </button>
                                <input name="data_from" value="search" hidden>
                                <input name="page" value="1" hidden>

                            </form>
                        </div>
                    </div>



                    <div class="col-3">
                        <!-- Toolbar-->
                        <div
                            class="navbar-toolbar cartAcc d-flex justify-content-end flex-shrink-0 align-items-center mt-3">
                            <a class="navbar-tool navbar-stuck-toggler" href="#">
                                <span class="navbar-tool-tooltip">{{ \App\CPU\translate('Expand Menu') }}</span>
                                <div class="navbar-tool-icon-box">
                                    <i class="navbar-tool-icon czi-menu open-icon"></i>
                                    <i class="navbar-tool-icon czi-close close-icon"></i>
                                </div>
                            </a>
                            {{-- <div class="navbar-tool dropdown {{Session::get('direction') === "rtl" ? 'mr-md-3' : 'ml-md-3'}}">
                        <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="{{route('wishlists')}}">
                            <span class="navbar-tool-label">
                                <span
                                    class="countWishlist">{{session()->has('wish_list')?count(session('wish_list')):0}}</span>
                           </span>
                            <i class="navbar-tool-icon czi-heart"></i>
                        </a>
                    </div> --}}
                            @if (auth('customer')->check())
                                <div class="dropdown">
                                    <a class="navbar-tool ml-3" type="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <div class="navbar-tool-icon-box bg-secondary">
                                            <div class="navbar-tool-icon-box bg-secondary">

                                                <img src="{{ asset('storage/app/public/profile/' .auth('customer')->user()->image) }}"
                                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                    class="img-profile rounded-circle __inline-14">


                                            </div>
                                        </div>
                                        <div class="navbar-tool-text">
                                            <small>{{ \App\CPU\translate('Hello') }},
                                                {{ auth('customer')->user()->f_name }}</small>
                                            {{ \App\CPU\translate('dashboard') }}
                                        </div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('account-oder') }}">
                                            {{ \App\CPU\translate('my_order') }} </a>
                                        <a class="dropdown-item" href="{{ route('user-account') }}">
                                            {{ \App\CPU\translate('my_profile') }}</a>
                                        <a class="dropdown-item" href="{{ route('home') }}">
                                            {{ \App\CPU\translate('Home') }}</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item"
                                            href="{{ route('customer.auth.logout') }}">{{ \App\CPU\translate('logout') }}</a>
                                    </div>
                                </div>
                            @elseif (auth('seller')->check())
                                <div class="dropdown">
                                    <a class="navbar-tool ml-3" type="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <div class="navbar-tool-icon-box bg-secondary">
                                            <div class="navbar-tool-icon-box bg-secondary">
                                                <img src="{{ asset('storage/app/public/profile/' . auth('seller')->user()->image) }}"
                                                    onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                                    class="img-profile rounded-circle __inline-14">
                                            </div>
                                        </div>

                                        <div class="navbar-tool-text">
                                            <small>{{ \App\CPU\translate('Hello') }},
                                                {{ auth('seller')->user()->f_name }}</small>
                                            {{ \App\CPU\translate('dashboard') }}
                                        </div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('account-oder') }}">
                                            {{ \App\CPU\translate('my_order') }} </a>
                                            <a class="dropdown-item" href="{{ route('user-account') }}">
                                                {{ \App\CPU\translate('my_profile') }}</a>
                                        <a class="dropdown-item" href="{{ route('home') }}">
                                            {{ \App\CPU\translate('Home') }}</a>
                                        <a class="dropdown-item" href="{{ url('seller/dashboard') }}">
                                            {{ \App\CPU\translate('Dashboard') }}</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item"
                                            href="{{ route('seller.auth.logout') }}">{{ \App\CPU\translate('logout') }}</a>
                                    </div>
                                </div>
                            @else
                                <div class="dropdown">
                                    <a class="navbar-tool fontt {{ Session::get('direction') === 'rtl' ? 'mr-md-0' : 'ml-md-0' }} navAccount"
                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="navbar-tool-icon-box bg-secondary">
                                            <div class="navbar-tool-icon-box bg-secondary accountSVG">
                                                <svg width="23" height="22" viewBox="0 0 23 22"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.0031 0H10.7391C4.66711 0.154 -0.13989 5.192 0.00310953 11.264C0.0691095 14.223 1.30111 16.885 3.25911 18.81C3.51211 19.052 3.77611 19.294 4.05111 19.514C4.32611 19.734 4.60111 19.943 4.89811 20.141C5.04111 20.24 5.19511 20.328 5.33811 20.427C5.78911 20.691 6.26211 20.933 6.75711 21.142C6.90011 21.197 7.04311 21.252 7.18611 21.318C7.20811 21.318 7.23011 21.329 7.25211 21.34C7.39511 21.395 7.54911 21.45 7.70311 21.494C7.85711 21.538 8.01111 21.582 8.16511 21.626C8.33011 21.67 8.49511 21.714 8.66011 21.747C8.71511 21.758 8.77011 21.769 8.82511 21.78C8.90211 21.802 8.99011 21.813 9.06711 21.824C9.22111 21.857 9.38611 21.879 9.55111 21.901C10.0131 21.967 10.4971 22 10.9811 22H11.2671C11.6411 21.989 12.0151 21.956 12.3781 21.912C12.7191 21.868 13.0601 21.813 13.3901 21.736C13.4121 21.725 13.4231 21.725 13.4451 21.725C13.9401 21.604 14.4241 21.461 14.8861 21.285C15.0511 21.219 15.2051 21.153 15.3701 21.087C15.4801 21.043 15.5901 20.988 15.7001 20.944C16.0961 20.757 16.4811 20.537 16.8551 20.306C17.0091 20.218 17.1521 20.119 17.2951 20.02C17.4381 19.921 17.5811 19.822 17.7131 19.712C18.0761 19.437 18.4171 19.129 18.7471 18.81C20.8261 16.753 22.0801 13.882 22.0031 10.736C21.8601 4.752 16.9651 0 11.0031 0ZM17.7901 16.588C16.7891 15.202 15.1831 14.3 13.3681 14.3H8.62711C6.82311 14.3 5.21711 15.191 4.21611 16.577C3.00611 15.103 2.25811 13.233 2.20311 11.209C2.09311 6.358 5.94311 2.321 10.7941 2.2H11.0031C15.7441 2.2 19.6821 6.05 19.8031 10.791C19.8581 12.991 19.0881 15.015 17.7901 16.588Z"
                                                        fill="#1E1E1E" />
                                                    <path
                                                        d="M14.3031 7.17201V11.022C14.3031 11.616 13.8191 12.1 13.2251 12.1H10.4751C8.94613 12.1 7.70312 10.857 7.70312 9.32801V7.17201C7.70312 5.64301 8.94613 4.40001 10.4751 4.40001H11.5311C13.0601 4.40001 14.3031 5.64301 14.3031 7.17201Z"
                                                        fill="#1E1E1E" />
                                                </svg>

                                                {{-- <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.25 4.41675C4.25 6.48425 5.9325 8.16675 8 8.16675C10.0675 8.16675 11.75 6.48425 11.75 4.41675C11.75 2.34925 10.0675 0.666748 8 0.666748C5.9325 0.666748 4.25 2.34925 4.25 4.41675ZM14.6667 16.5001H15.5V15.6667C15.5 12.4509 12.8825 9.83341 9.66667 9.83341H6.33333C3.11667 9.83341 0.5 12.4509 0.5 15.6667V16.5001H14.6667Z" fill="#1B7FED"/>
                                        </svg> --}}

                                            </div>
                                        </div>
                                        Account


                                    </a>
                                    <div class="dropdown-menu __auth-dropdown dropdown-menu-{{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}"
                                        aria-labelledby="dropdownMenuButton"
                                        style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};">
                                        <a class="dropdown-item" href="{{ route('customer.auth.login') }}">
                                            <i
                                                class="fa fa-sign-in {{ Session::get('direction') === 'rtl' ? 'mr-2' : 'mr-2' }}"></i>
                                            {{ \App\CPU\translate('sign_in') }}
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('customer.auth.sign-up') }}">
                                            <i
                                                class="fa fa-user-circle {{ Session::get('direction') === 'rtl' ? 'mr-2' : 'mr-2' }}"></i>{{ \App\CPU\translate('sign_up') }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                            <div id="cart_items">
                                @include('layouts.front-end.partials.cart')
                            </div>
                        </div>

                    </div>


                </div>
            </div>


        </div>
    </div>
</header>
@push('script')
    <script>
        function myFunction() {
            $('#anouncement').slideUp(300)
        }
    </script>
@endpush

