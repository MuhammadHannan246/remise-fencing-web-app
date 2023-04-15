<div class="navbar navbar-expand-md navbar-stuck-menu categoryNav">
    <div class="container px-10px">
        <div class="collapse navbar-collapse" id="navbarCollapse"
            style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}; ">

            <!-- Search-->
            <div class="input-group-overlay d-md-none my-3">
                <form action="{{ route('products') }}" type="submit" class="search_form">
                    <input class="form-control appended-form-control search-bar-input-mobile" type="text"
                        autocomplete="off" placeholder="{{ \App\CPU\translate('search') }}" name="name">
                    <input name="data_from" value="search" hidden>
                    <input name="page" value="1" hidden>
                    <button class="input-group-append-overlay search_button" type="submit"
                        style="border-radius: {{ Session::get('direction') === 'rtl' ? '7px 0px 0px 7px; right: unset; left: 0' : '0px 7px 7px 0px; left: unset; right: 0' }};">
                        <span class="input-group-text __text-20px">
                            <i class="czi-search text-white"></i>
                        </span>
                    </button>
                    <diV class="card search-card __inline-13">
                        <div class="card-body search-result-box" id=""
                            style="overflow:scroll; height:400px;overflow-x: hidden"></div>
                    </diV>
                </form>
            </div>

            @php($categories = \App\Model\Category::with(['childes.childes'])->where('position', 0)->priority()->paginate(11),)
            <ul
                class="navbar-nav mega-nav pr-2 pl-2 toggleCat {{ Session::get('direction') === 'rtl' ? 'mr-2' : 'mr-2' }} d-none d-xl-block __mega-nav">
                <li class="nav-item {{ !request()->is('/') ? 'dropdown' : '' }}">
                    <a class="nav-link  dropdown-toggle {{ Session::get('direction') === 'rtl' ? 'pr-0' : 'pl-0' }}"
                        href="#" data-toggle="dropdown"
                        style="{{ request()->is('/') ? 'pointer-events: none' : '' }}">
                        <i class="czi-menu align-middle mt-n1 {{ Session::get('direction') === 'rtl' ? 'mr-2' : 'mr-2' }}"
                            style="color:#fff;"></i>
                        <span class="navCate"
                            style="color:#fff; margin-{{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 30px !important;margin-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}:">
                            {{ \App\CPU\translate('categories') }}
                        </span>
                    </a>
                    @if (request()->is('/'))
                        <ul class="dropdown-menu __dropdown-menu"
                            style="{{ Session::get('direction') === 'rtl' ? 'margin-right: 1px!important;text-align: right;' : 'margin-left: 1px!important;text-align: left;' }}padding-bottom: 0px!important;">
                            @foreach ($categories as $key => $category)
                                @if ($key < 8)
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
                                                        <a class="dropdown-item flex-between"
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
                                @endif
                            @endforeach
                            <li class="dropdown">
                                <a class="dropdown-item text-capitalize text-center"
                                    href="{{ route('categories') }}" style="color: #FF061E; !important;">
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
                                    } ?> "
                                        <?php if ($category->childes->count() > 0) {
                                            echo "data-toggle='dropdown'";
                                        } ?> href="javascript:"
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

            <ul class="navbar-nav mega-nav1 pr-2 pl-2 d-block d-xl-none">
                <!--mobile-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Session::get('direction') === 'rtl' ? 'pr-0' : 'pl-0' }}"
                        href="#" data-toggle="dropdown">
                        <i
                            class="czi-menu align-middle mt-n1 {{ Session::get('direction') === 'rtl' ? 'ml-2' : 'mr-2' }}"></i>
                        <span
                            style="margin-{{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 20px !important;">{{ \App\CPU\translate('categories') }}</span>
                    </a>
                    <ul class="dropdown-menu __dropdown-menu-2"
                        style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};">
                        @foreach ($categories as $category)
                            <li class="dropdown">

                                <a <?php if ($category->childes->count() > 0) {
                                    echo '';
                                } ?>
                                    href="{{ route('products', ['id' => $category['id'], 'data_from' => 'category', 'page' => 1]) }}">
                                    <img src="{{ asset("storage/app/public/category/$category->icon") }}"
                                        onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'"
                                        class="__img-18">
                                    <span
                                        class="{{ Session::get('direction') === 'rtl' ? 'pr-3' : 'pl-3' }}">{{ $category['name'] }}</span>

                                </a>
                                @if ($category->childes->count() > 0)
                                    <a data-toggle='dropdown' class='__ml-50px'>
                                        <i
                                            class="czi-arrow-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }} __inline-16"></i>
                                    </a>
                                @endif

                                @if ($category->childes->count() > 0)
                                    <ul class="dropdown-menu"
                                        style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};">
                                        @foreach ($category['childes'] as $subCategory)
                                            <li class="dropdown">
                                                <a
                                                    href="{{ route('products', ['id' => $subCategory['id'], 'data_from' => 'category', 'page' => 1]) }}">
                                                    <span
                                                        class="{{ Session::get('direction') === 'rtl' ? 'pr-3' : 'pl-3' }}">{{ $subCategory['name'] }}</span>
                                                </a>

                                                @if ($subCategory->childes->count() > 0)
                                                    <a style="font-family:  sans-serif !important;font-size: 1rem;
                                                    font-weight: 300;line-height: 1.5;margin-left:50px;"
                                                        data-toggle='dropdown'>
                                                        <i
                                                            class="czi-arrow-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }} __inline-16"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
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
                    </ul>
                </li>
            </ul>
            <!-- Primary menu-->
            <ul class="navbar-nav nav_float"
                style="{{ Session::get('direction') === 'rtl' ? 'padding-right: 0px ' : '' }}">
                <li class="nav-item dropdown {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link navLink"
                        href="{{ route('home') }}">{{ \App\CPU\translate('Home') }}</a>
                    {{-- <a class="nav-link" href="{{route('home')}}">{{ \App\CPU\translate('Home')}}</a> --}}
                </li>

                @if (\App\Model\BusinessSetting::where(['type' => 'product_brand'])->first()->value)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle navLink" href="#"
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
                                    <a class="dropdown-item" href="{{ route('brands') }}"
                                        style="color: {{ $web_config['primary_color'] }} !important;">
                                        {{ \App\CPU\translate('View_more') }}
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif
                @php($discount_product = App\Model\Product::with(['reviews'])->active()->where('discount', '!=', 0)->count(),)
                @if ($discount_product > 0)
                    <li class="nav-item dropdown {{ request()->is('/') ? 'active' : '' }}">
                        <a class="nav-link text-capitalize navLink"
                            href="{{ route('products', ['data_from' => 'discounted', 'page' => 1]) }}">{{ \App\CPU\translate('Trending Products') }}</a>
                    </li>
                @endif

                @php($business_mode = \App\CPU\Helpers::get_business_settings('business_mode'))
                @if ($business_mode == 'multi')
                    <li class="nav-item dropdown {{ request()->is('/') ? 'active' : '' }}">
                        <a class="nav-link navLink"
                            href="{{ route('sellers') }}">{{ \App\CPU\translate('Special Offers') }}</a>
                    </li>

                    @php($seller_registration = \App\Model\BusinessSetting::where(['type' => 'seller_registration'])->first()->value)
                    @if ($seller_registration)
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle navLink1" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"
                                    style="padding-{{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}: 0">
                                    {{ \App\CPU\translate('Seller') }} {{ \App\CPU\translate('zone') }}
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
                                        {{ \App\CPU\translate('Seller') }} {{ \App\CPU\translate('login') }}
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