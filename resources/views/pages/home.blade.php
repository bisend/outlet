@extends('layout')

@section('content')

    {{--MAIN SLIDER START--}}
    @if(!is_null($model->main_slider) && $model->main_slider->count() > 0)
        <div class="home-slider">
            <div class="owl-carousel owl-theme owl-homeSlider">
                @php($counter = 0)
                @foreach($model->main_slider as $slide)
                    <div>
                        <div class="home-slider-img">
                            <div class="home-slider-bg"></div>
                            <img src="{{ $slide->image }}" alt="slide-{{ $counter }}">
                            <div class="home-slider-text animated-slider-text">
                                <h2>{{ $slide->big_text }}</h2>
                                <p>{{ $slide->small_text }}</p>
                                <a href="{{ $slide->url }}" class="btn">{{ $slide->btn_text }}</a>
                            </div>
                        </div>
                    </div>
                    @php($counter++)
                @endforeach
            </div>
        </div>
    @endif
    {{--MAIN SLIDER END--}}


    {{--NEW SLIDER START--}}
    @if(!is_null($model->new_slider_products) && $model->new_slider_products->count() > 0)
        <div class="home-prod-slider">
            <div class="container">
                <div class="slider-products-section">
                    <div class="slider-products-header">
                        Новинки
                    </div>
                    <div class="owl-carousel owl-theme owl-products" id="new-products">
                        @foreach($model->new_slider_products as $product)
                            <div>
                                <div class="prod-item">
                                    <div class="prod-img">
                                        <div class="label new">New</div>
                                        <img src="{{ $product->images[0]->medium }}" alt="{{ $product->name }}">
                                        <div class="item-overlay">
                                            <a class="add-to-wishlist" href="#">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                            <div class="size-addToCart">
                                                <div class="size">
                                                    @php($counter = 0)
                                                    @foreach($product->sizes as $size)
                                                        @if($counter == 0)
                                                            <span class="active">{{ $size->name }}</span>
                                                        @else
                                                            <span>{{ $size->name }}</span>
                                                        @endif
                                                        @php($counter++)
                                                    @endforeach
                                                </div>
                                                <a href="#" class="btn">{{ trans('layout.add_to_cart') }}</a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="stars">

                                        @for($i = 1; $i <= 5; $i++)
                                            @if(!is_null($product->rating))
                                                @if($i <= $product->rating)
                                                    <span class="active"><i class="fas fa-star"></i></span>
                                                @else
                                                    <span><i class="fas fa-star"></i></span>
                                                @endif
                                            @else
                                                <span><i class="fas fa-star"></i></span>
                                            @endif
                                        @endfor

                                    </div>
                                    <div class="prod-title">
                                        <a href="{{ url_product($product->slug, $model->language) }}">
                                            {{ $product->name }}
                                        </a>
                                    </div>
                                    <div class="prod-price">
                                        @if(!is_null($product->old_price))
                                            <span class="old-price"> {{ $product->old_price }} грн </span>
                                        @endif
                                        <span> {{ $product->price }} грн </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="show-all-products">
                    <a href="">{{ trans('home.see_all') }}</a>
                </div>
            </div>
        </div>
    @endif
    {{--NEW SLIDER END--}}

    {{--BANNERS START--}}
    @if(!is_null($model->banners) && $model->banners->count() > 0)
    <section class="banner">
        <div class="container">
            <div class="row">
                @for($i = 0; $i < 3; $i++)
                    <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                        @php($counter = 0)
                        @foreach($model->banners as $banner)
                            @if(($i == 0 && $counter == 0) || ($i == 1 && $counter == 3) || ($i == 2 && $counter == 4))
                                <div class="block1 height-img">
                                    <a href="{{ $banner->url }}">
                                        <div class="banner-img-bg"></div>
                                        <img src="{{ $banner->image }}" alt="banner-{{ $counter }}">
                                        <div class="banner-text">
                                            <span>{{ $banner->text }}</span>
                                            <a href="{{ $banner->url }}" class="btn">
                                                {{ $banner->btn_text }}
                                            </a>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            @if(($i == 0 && $counter == 1) || ($i == 1 && $counter == 2) || ($i == 2 && $counter == 5))
                                <div class="block1 standart-img">
                                    <a href="{{ $banner->url }}">
                                        <div class="banner-img-bg"></div>
                                        <img src="{{ $banner->image }}" alt="banner-{{ $counter }}">
                                        <div class="banner-text">
                                            <span>{{ $banner->text }}</span>
                                            <a href="{{ $banner->url }}" class="btn">
                                                {{ $banner->btn_text }}
                                            </a>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            @php($counter++)
                        @endforeach
                    </div>
                @endfor
            </div>
        </div>
    </section>
    @endif
    {{--BANNERS END--}}

    {{--SALES START--}}
    @if(!is_null($model->sales_slider_products) && $model->new_slider_products->count() > 0)
        <div class="home-prod-slider">
            <div class="container">
                <div class="slider-products-section">
                    <div class="slider-products-header">
                        {{ trans('header.sale') }}
                    </div>
                    <div class="owl-carousel owl-theme owl-products" id="sale-products">
                        @foreach($model->sales_slider_products as $product)
                            <div>
                                <div class="prod-item">
                                    <div class="prod-img">
                                        <div class="label sale">Sale</div>
                                        <img src="{{ $product->images[0]->medium }}" alt="{{ $product->name }}">
                                        <div class="item-overlay">
                                            <a class="add-to-wishlist" href="#">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                            <div class="size-addToCart">
                                                <div class="size">
                                                    @php($counter = 0)
                                                    @foreach($product->sizes as $size)
                                                        @if($counter == 0)
                                                            <span class="active">{{ $size->name }}</span>
                                                        @else
                                                            <span>{{ $size->name }}</span>
                                                        @endif
                                                        @php($counter++)
                                                    @endforeach
                                                </div>
                                                <a href="#" class="btn">{{ trans('layout.add_to_cart') }}</a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="stars">

                                        @for($i = 1; $i <= 5; $i++)
                                            @if(!is_null($product->rating))
                                                @if($i <= $product->rating)
                                                    <span class="active"><i class="fas fa-star"></i></span>
                                                @else
                                                    <span><i class="fas fa-star"></i></span>
                                                @endif
                                            @else
                                                <span><i class="fas fa-star"></i></span>
                                            @endif
                                        @endfor

                                    </div>
                                    <div class="prod-title">
                                        <a href="{{ url_product($product->slug, $model->language) }}">
                                            {{ $product->name }}
                                        </a>
                                    </div>
                                    <div class="prod-price">
                                        @if(!is_null($product->old_price))
                                            <span class="old-price"> {{ $product->old_price }} грн </span>
                                        @endif
                                        <span> {{ $product->price }} грн </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="show-all-products">
                    <a href="">{{ trans('home.see_all') }}</a>
                </div>
            </div>
        </div>
    @endif
    {{--SALES END--}}

    {{--TOP START--}}
    <div class="home-prod-slider">
        <div class="container">
            <div class="slider-products-section">
                <div class="slider-products-header">
                    Топ продаж
                </div>
                <div class="owl-carousel owl-theme owl-products" id="top-products">
                    @foreach($model->top_slider_products as $product)
                        <div>
                            <div class="prod-item">
                                <div class="prod-img">
                                    <div class="label top">Top</div>
                                    <img src="{{ $product->images[0]->medium }}" alt="{{ $product->name }}">
                                    <div class="item-overlay">
                                        <a class="add-to-wishlist" href="#">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <div class="size-addToCart">
                                            <div class="size">
                                                @php($counter = 0)
                                                @foreach($product->sizes as $size)
                                                    @if($counter == 0)
                                                        <span class="active">{{ $size->name }}</span>
                                                    @else
                                                        <span>{{ $size->name }}</span>
                                                    @endif
                                                    @php($counter++)
                                                @endforeach
                                            </div>
                                            <a href="#" class="btn">{{ trans('layout.add_to_cart') }}</a>
                                        </div>

                                    </div>
                                </div>
                                <div class="stars">

                                    @for($i = 1; $i <= 5; $i++)
                                        @if(!is_null($product->rating))
                                            @if($i <= $product->rating)
                                                <span class="active"><i class="fas fa-star"></i></span>
                                            @else
                                                <span><i class="fas fa-star"></i></span>
                                            @endif
                                        @else
                                            <span><i class="fas fa-star"></i></span>
                                        @endif
                                    @endfor

                                </div>
                                <div class="prod-title">
                                    <a href="{{ url_product($product->slug, $model->language) }}">
                                        {{ $product->name }}
                                    </a>
                                </div>
                                <div class="prod-price">
                                    @if(!is_null($product->old_price))
                                        <span class="old-price"> {{ $product->old_price }} грн </span>
                                    @endif
                                    <span> {{ $product->price }} грн </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="show-all-products">
                <a href="">{{ trans('home.see_all') }}</a>
            </div>
        </div>
    </div>
    {{--TOP END--}}


@endsection