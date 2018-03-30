<header>
    <div class="top_nav">
        <div class="container">
            <div class="flex-container">
                <ul class="staticPage">
                    <li>
                        <a href="">Про нас</a>
                    </li>
                    <li>
                        <a href="">Оплата та доставка</a>
                    </li>
                    <li>
                        <a href="">Гарантії</a>
                    </li>
                    <li>
                        <a href="">Обмін та повернення</a>
                    </li>
                </ul>
                <div class="lang_login">
                    <ul>
                        @if($model->language == 'ru')
                            <li>
                                <span class="lang">
                                    Рус <i class="fas fa-chevron-down"></i>
                                    <span class="lang-second">
                                        <div class="lang-padding"></div>
                                        <a href="{{ url_current('uk') }}">Укр</a>
                                    </span>
                                </span>
                            </li>
                        @else
                            <li>
                                <span class="lang">
                                    Укр <i class="fas fa-chevron-down"></i>
                                    <span class="lang-second">
                                        <div class="lang-padding"></div>
                                        <a href="{{ url_current('ru') }}">Рус</a>
                                    </span>
                                </span>
                            </li>
                        @endif

                        @if(auth()->check())
                            <li>
                                <a href="#">John Doe</a>
                            </li>
                        @else
                            <li>
                                <a href="#">{{ trans('header.login') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ trans('header.register') }}</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="main-nav">
        <div class="container">
            <div class="flex-container">
                <div class="mobile_nav">
                    <a class="open-nav" href="javascript:void(0);" data-menu-open-link>
                        <i class="fas fa-bars"></i>
                    </a>
                    <div id="mySidenav" class="sidenav">
                        <div class="nav-header">
                            <span>Меню</span>

                            <div class="closebtn" data-menu-close-link>
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </div>
                            <!--  <a href="javascript:void(0);" class="closebtn" data-menu-close-link>&times;</a> -->
                        </div>
                        <div class="nav-slide-body">
                            <ul>
                                @foreach($model->categories as $category)
                                    @if($category->childs->count() > 0)
                                        <li>
                                            <div class="dropdown-div">
                                                <div class="dropdown-div-btn">
                                                    <a href="{{ url_category($category->slug, $model->language) }}">
                                                        {{ $category->name }}
                                                    </a>
                                                    <span><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                                </div>
                                                <div class="dropdown-div-content dropdown-div-content-none">
                                                    <ul>
                                                        @foreach($category->childs as $child)
                                                            <li>
                                                                <a href="{{ url_category($child->slug, $model->language) }}">
                                                                    {{ $child->name }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    @else
                                        <li>
                                            <a class="default-link" href="{{ url_category($category->slug, $model->language) }}">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                                <li>
                                    <a class="default-link" href="">Розпродаж</a>
                                </li>
                                <li>
                                    <a class="default-link" href="">Про нас</a>
                                </li>
                                <li>
                                    <a class="default-link" href="">Оплата та доставка</a>
                                </li>
                                <li>
                                    <a class="default-link" href="">Гарантії</a>
                                </li>
                                <li>
                                    <a class="default-link" href="">Обмін та повернення</a>
                                </li>
                                @if(auth()->check())
                                    <li>
                                        <a href="#">John Doe</a>
                                    </li>
                                @else
                                    <li>
                                        <a class="default-link" href="#">{{ trans('header.login') }}</a>
                                    </li>
                                    <li>
                                        <a class="default-link" href="#">{{ trans('header.register') }}</a>
                                    </li>
                                @endif
                                <li>
                                    @if($model->language == 'ru')
                                        <div class="dropdown-div">
                                            <div class="dropdown-div-btn">
                                                <a href="{{ url_current('ru') }}">Рус</a>
                                                <span><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="dropdown-div-content dropdown-div-content-none">
                                                <ul>
                                                    <li>
                                                        <a href="{{ url_current('uk') }}">Укр</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @else
                                        <div class="dropdown-div">
                                            <div class="dropdown-div-btn">
                                                <a href="{{ url_current('uk') }}">Укр</a>
                                                <span><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="dropdown-div-content dropdown-div-content-none">
                                                <ul>
                                                    <li>
                                                        <a href="{{ url_current('ru') }}">Рус</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="logo">
                    <a href="{{ url_home($model->language) }}">
                        <img src="/img/logo.png" alt="outlet-logo">
                    </a>
                </div>

                <div class="search_phone">
                    <div class="phone">
                        <img src="/img/customer-service.png" alt="">
                        <ul>
                            <li><span>+38(096)-52-30-540</span></li>
                            <li><span>+38(096)-52-30-540</span></li>
                        </ul>
                    </div>
                    <div class="search">
                        <form action="">
                            <input type="text" placeholder="Пошук по сайту...">
                            <button>
                                <i class="fas fa-search"></i>
                            </button>

                            <div class="search-result">
                                <div class="result-item">
                                    <div class="product-img">
                                        <div class="label sale">Sale</div>
                                        <a href="">
                                            <img src="/img/products/small/item-7.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="">
                                            <span class="title">Reebok classic</span>
                                            <span class="old-price">2000 грн</span>
                                            <span class="price">1950 грн</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="result-item">
                                    <div class="product-img">
                                        <div class="label top">Top</div>
                                        <a href="">
                                            <img src="/img/products/small/item-1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="">
                                            <span class="title">Reebok classic</span>
                                            <span class="old-price">2000 грн</span>
                                            <span class="price">1950 грн</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="result-item">
                                    <div class="product-img">
                                        <div class="label new">New</div>
                                        <a href="">
                                            <img src="/img/products/small/item-6.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="">
                                            <span class="title">Reebok classic</span>
                                            <span class="old-price">2000 грн</span>
                                            <span class="price">1950 грн</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="show-all-result">
                                    <a href="" class="btn">
                                        {{ trans('header.search_all_results') }}
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="main-nav_btn">
                    <ul>
                        <li class="wishlist-btn">
                            <a href=""><i class="fas fa-heart"></i> </a>
                        </li>
                        <li class="smoll-cart">
                            <span class="badge-count">3</span>
                            <span><i class="fas fa-shopping-bag"></i></span>
                            <div class="smoll-cart-products">
                                <div class="smoll-cart-padding"></div>

                                <div class="smoll-cart-products-block">
                                    <div class="smoll-cart-item">
                                        <div class="delete-smoll-prod">
                                            <a href=""><i class="far fa-trash-alt"></i></a>
                                        </div>
                                        <div class="smoll-cart-img">
                                            <div class="label sale">Sale</div>
                                            <a href="">
                                                <img src="/img/products/small/item-7.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="smoll-cart-info">
                                            <div class="title">
                                                <a href="">Reebok classic</a>
                                            </div>
                                            <div class="count_price">
                                                <span class="count">3</span> x <span class="price">1900 грн</span>
                                            </div>
                                            <div class="total_price">
                                                {{ trans('header.sum') }}: <span>1900 грн</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="smoll-cart-item">
                                        <div class="delete-smoll-prod">
                                            <a href=""><i class="far fa-trash-alt"></i></a>
                                        </div>
                                        <div class="smoll-cart-img">
                                            <div class="label new">New</div>
                                            <a href="">
                                                <img src="/img/products/small/item-4.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="smoll-cart-info">
                                            <div class="title">
                                                <a href="">Reebok classic</a>
                                            </div>
                                            <div class="count_price">
                                                <span class="count">3</span> x <span class="price">1900 грн</span>
                                            </div>
                                            <div class="total_price">
                                                {{ trans('header.sum') }}: <span>1900 грн</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="smoll-cart-item">
                                        <div class="delete-smoll-prod">
                                            <a href=""><i class="far fa-trash-alt"></i></a>
                                        </div>
                                        <div class="smoll-cart-img">
                                            <div class="label top">Top</div>
                                            <a href="">
                                                <img src="/img/products/small/item-5.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="smoll-cart-info">
                                            <div class="title">
                                                <a href="">Reebok classic</a>
                                            </div>
                                            <div class="count_price">
                                                <span class="count">3</span> x <span class="price">1900 грн</span>
                                            </div>
                                            <div class="total_price">
                                                {{ trans('header.sum') }}: <span>1900 грн</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="smoll-cart-footer">
                                    <div class="all-count-price">
                                        {{ trans('header.sum') }}: 52034 грн
                                    </div>
                                    <div class="smoll-cart-footer-btn">
                                        <a href="#" class="btn">{{ trans('header.to_order') }}</a>
                                        <a href="#" class="btn">{{ trans('header.open_cart') }}</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="category-nav">
        <div class="container">
            <div class="flex-container">
                <ul class="category-list">
                    @foreach($model->categories as $category)
                        @if($category->childs->count() > 0)
                            <li class="show-dropdown-category">
                                <a href="{{ url_category($category->slug, $model->language) }}">
                                    {{ $category->name }}<i class="fas fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-category">
                                    <div class="categ-drop-padding"></div>
                                    @foreach($category->childs as $child)
                                        <li>
                                            <a href="{{ url_category($child->slug, $model->language) }}">
                                                {{ $child->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li>
                                <a href="{{ url_category($category->slug, $model->language) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="nav-sale-btn">
                    <a href="">{{ trans('header.sale') }}</a>
                </div>
            </div>
        </div>
    </div>
</header>

{{--<div class="dropdown-div">--}}
    {{--<div class="dropdown-div-btn">--}}
        {{--<a href="">Жіноче</a>--}}
        {{--<span><i class="fas fa-chevron-up"></i></span>--}}
    {{--</div>--}}
    {{--<div class="dropdown-div-content">--}}
        {{--<div class="dropdown-div-content">--}}
            {{--<ul>--}}
                {{--<li>--}}
                    {{--<a href="">Верхній одяг</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="">Нижній одяг</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="">Взуття</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="">Аксесуари</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}