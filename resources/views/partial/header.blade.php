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
                                <a data-toggle="modal" data-target="#loginModal" href="#">{{ trans('header.login') }}</a>
                            </li>
                            <li>
                                <a data-toggle="modal" data-target="#registrModal" href="#">{{ trans('header.register') }}</a>
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
                    <div id="search" class="search">
                        <form v-bind:action="url" method="get">
                            <input
                                   v-model="series"
                                   @keyup.esc="onEsc"
                                   @blur.prevent="onBlur"
                                   @keyup="searchAjax()"
                                   type="search"
                                   autocomplete="false"
                                   placeholder="{{ trans('header.search')}}">
                            <button v-if="!loading" @click.prevent="search()" class="search-btn">
                                <i class="fas fa-search"></i>
                            </button>
                            <button v-else>
                                <half-circle-spinner
                                        style="margin: 0 auto;"
                                        :animation-duration="1000"
                                        :size="30"
                                        color="#000">
                                </half-circle-spinner>
                            </button>

                            <div v-cloak v-if="countSearchProducts == 0 && series != '' && showNoResult" class="search-result">
                                <span>{{ trans('header.not_found') }}</span>
                            </div>
                            <div v-cloak v-if="countSearchProducts > 0 && series != '' && showResult" class="search-result">
                                <div v-for="searchProduct in searchProducts" class="result-item">
                                    <div class="product-img">
                                        <div class="label sale">Sale</div>
                                        <a :href="'/product/' + searchProduct.slug + '/{{ $model->language == 'ru' ? '' : $model->language }}'" class="result-item-link">
                                            <img :src="searchProduct.images[0].small" :alt="searchProduct.name">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a :href="'/product/' + searchProduct.slug + '/{{ $model->language == 'ru' ? '' : $model->language }}'" class="result-item-link">
                                            <span class="title">@{{ searchProduct.name }}</span>
                                            <span v-if="searchProduct.old_price" class="old-price">
                                                @{{ searchProduct.old_price }} грн
                                            </span>
                                            <span class="price">@{{ searchProduct.price }} грн</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="show-all-result">
                                    <a :href="url" class="btn all-search-results-btn">
                                        {{ trans('header.search_all_results') }} (@{{ countSearchProducts }})
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
                        <li id="small-cart" class="smoll-cart" :class="{'show-prods': cart.totalCount > 0}">
                            <span v-cloak class="badge-count">@{{ cart.totalCount }}</span>
                            <span><i class="fas fa-shopping-bag"></i></span>
                            <div class="smoll-cart-products">
                                <div class="smoll-cart-padding"></div>

                                <div class="smoll-cart-products-block">
                                    <div v-for="cartItem in cart.cartItems" class="smoll-cart-item">
                                        <div class="delete-smoll-prod">
                                            <a href="#"
                                               @click.prevent="deleteFromCart(cartItem.productId, cartItem.sizeId)">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </div>
                                        <div class="smoll-cart-img">

                                            <div v-if="cartItem.product.promotions != null &&
                                                    cartItem.product.promotions.length > 0 &&
                                                    cartItem.product.promotions[0].priority == 3"
                                                 class="label sale">
                                                Sale
                                            </div>
                                            <div v-else-if="cartItem.product.promotions != null &&
                                                    cartItem.product.promotions.length > 0 &&
                                                    cartItem.product.promotions[0].priority == 1"
                                                 class="label new">
                                                New
                                            </div>

                                            <div v-else-if="cartItem.product.promotions != null &&
                                                    cartItem.product.promotions.length > 0 &&
                                                    cartItem.product.promotions[0].priority == 2"
                                                 class="label top">
                                                Top
                                            </div>

                                            <a :href="'/product/' + cartItem.product.slug + '/{{ $model->language == 'ru' ? '' : $model->language }}'">
                                                <img :src="cartItem.product.images[0].small" :alt="cartItem.product.name">
                                            </a>
                                        </div>
                                        <div class="smoll-cart-info">
                                            <div class="title">
                                                <a :href="'/product/' + cartItem.product.slug + '/{{ $model->language == 'ru' ? '' : $model->language }}'">
                                                    @{{ cartItem.product.name }}
                                                </a>
                                            </div>
                                            <div class="count_price">
                                                <span class="count">@{{ cartItem.count }}</span> x <span class="price">@{{ cartItem.product.price }} грн</span>
                                            </div>
                                            <div class="total_price">
                                                {{ trans('header.sum') }}: <span>@{{ (cartItem.product.price * cartItem.count).toFixed(2) }} грн</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="smoll-cart-footer">
                                    <div class="all-count-price">
                                        {{ trans('header.sum') }}: @{{ cart.totalAmount.toFixed(2) }} грн
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
                    <a href="{{ url_sale($model->language) }}">{{ trans('header.sale') }}</a>
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