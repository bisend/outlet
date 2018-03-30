@extends('layout')

@section('content')

    {{--MAIN SLIDER START--}}
    @if(!is_null($model->main_slider) && $model->main_slider->count() > 0)
        <div class="home-slider">
            <div class="owl-carousel owl-theme owl-homeSlider">
                @foreach($model->main_slider as $slide)
                    <div>
                        <div class="home-slider-img">
                            <div class="home-slider-bg"></div>
                            <img src="{{ $slide->image }}" alt="">
                            <div class="home-slider-text animated-slider-text">
                                <h2>{{ $slide->big_text }}</h2>
                                <p>{{ $slide->small_text }}</p>
                                <a href="{{ $slide->url }}" class="btn">{{ $slide->btn_text }}</a>
                            </div>
                        </div>
                    </div>
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
                                                <a href="#" class="btn">В кошик</a>
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
                    <a href="">Переглянути усі</a>
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

                {{--@php($counter = 0)--}}
                {{--@foreach($model->banners as $banner)--}}
                    {{--@if($counter <= 2)--}}
                    {{--@endif--}}
                    {{--@php($counter++)--}}
                {{--@endforeach--}}

                @for($i = 0; $i < 3; $i++)
                    <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                        @php($counter = 0)
                        @foreach($model->banners as $banner)
                            @if($i == 0 && $counter == 0)
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
                            @php($counter++)
                        @endforeach
                    </div>
                @endfor

                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 height-img">
                        <a href="">
                        <div class="banner-img-bg"></div>
                        <img src="/img/products/medium/item-1.jpg" alt="IMG-BENNER">
                        <div class="banner-text">
                            <span>Чоловіче взуття</span>
                            <a href="#" class="btn">
                                Переглянути
                            </a>
                        </div>
                        </a>
                    </div>

                    <!-- block1 -->
                    <div class="block1 standart-img">
                        <a href="">
                        <div class="banner-img-bg"></div>
                        <img src="/img/products/medium/item-7.jpg" alt="IMG-BENNER">
                        <div class="banner-text">
                            <span>Жіноче взуття</span>
                            <a href="#" class="btn">
                                Переглянути
                            </a>
                        </div>
                        </a>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 standart-img">
                        <a href="">
                        <div class="banner-img-bg"></div>
                        <img src="/img/products/medium/item-2.jpg" alt="IMG-BENNER">
                        <div class="banner-text">
                            <span>Для хлопчиків</span>
                            <a href="#" class="btn">
                                Переглянути
                            </a>
                        </div>
                        </a>
                    </div>

                    <!-- block1 -->
                    <div class="block1 height-img">
                        <a href="">
                        <div class="banner-img-bg"></div>
                        <img src="/img/products/medium/item-3.jpg" alt="IMG-BENNER">
                        <div class="banner-text">
                            <span>Для дівчаток</span>
                            <a href="#" class="btn">
                                Переглянути
                            </a>
                        </div>
                        </a>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 height-img">
                        <a href="">
                        <div class="banner-img-bg"></div>
                        <img src="/img/products/medium/item-4.jpg" alt="IMG-BENNER">
                        <div class="banner-text">
                            <span>Розпродаж</span>
                            <a href="#" class="btn">
                                Переглянути
                            </a>
                        </div>
                        </a>
                    </div>

                    <!-- block2 -->
                    <div class="block1 standart-img">
                        <a href="">
                            <div class="banner-img-bg"></div>
                            <img src="/img/products/medium/item-6.jpg" alt="IMG-BENNER">
                            <div class="banner-text">
                                <span>Новинки</span>
                                <a href="#" class="btn">
                                    Переглянути
                                </a>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    {{--BANNERS END--}}

    <div class="home-prod-slider">
        <div class="container">
            <div class="slider-products-section">
                <div class="slider-products-header">
                    Розпродаж
                </div>
                <div class="owl-carousel owl-theme owl-products" id="sale-products">
                    <div>
                        <div class="prod-item">
                            <div class="prod-img">
                                <div class="label sale">Sale</div>
                                <img src="/img/products/medium/item-7.jpg" alt="">
                                <div class="item-overlay">
                                    <a class="add-to-wishlist" href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                    <div class="size-addToCart">
                                        <div class="size">
                                            <span>40</span>
                                            <span>35</span>
                                            <span class="active">36</span>
                                            <span>37</span>
                                            <span>38</span>
                                            <span>39</span>
                                        </div>
                                        <a href="" class="btn">В кошик</a>
                                    </div>

                                </div>
                            </div>
                            <div class="stars">
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="prod-title">
                                <a href="">Reabook Classic</a>
                            </div>
                            <div class="prod-price">
                                <span class="old-price"> 2000 грн </span>
                                <span> 1800 грн </span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="prod-item">
                            <div class="prod-img">
                                <div class="label sale">Sale</div>
                                <img src="/img/products/medium/item-1.jpg" alt="">
                                <div class="item-overlay">
                                    <a class="add-to-wishlist" href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                    <div class="size-addToCart">
                                        <div class="size">
                                            <span>40</span>
                                            <span>35</span>
                                            <span class="active">36</span>
                                            <span>37</span>
                                            <span>38</span>
                                            <span>39</span>
                                        </div>
                                        <a href="" class="btn">В кошик</a>
                                    </div>

                                </div>
                            </div>
                            <div class="stars">
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="prod-title">
                                <a href="">Reabook Classic</a>
                            </div>
                            <div class="prod-price">
                                <span class="old-price"> 2000 грн </span>
                                <span> 1800 грн </span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="prod-item">
                            <div class="prod-img">
                                <div class="label sale">Sale</div>
                                <img src="/img/products/medium/item-2.jpg" alt="">
                                <div class="item-overlay">
                                    <a class="add-to-wishlist" href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                    <div class="size-addToCart">
                                        <div class="size">
                                            <span>40</span>
                                            <span>35</span>
                                            <span class="active">36</span>
                                            <span>37</span>
                                            <span>38</span>
                                            <span>39</span>
                                        </div>
                                        <a href="" class="btn">В кошик</a>
                                    </div>

                                </div>
                            </div>
                            <div class="stars">
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="prod-title">
                                <a href="">Reabook Classic</a>
                            </div>
                            <div class="prod-price">
                                <span class="old-price"> 2000 грн </span>
                                <span> 1800 грн </span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="prod-item">
                            <div class="prod-img">
                                <div class="label sale">Sale</div>
                                <img src="/img/products/medium/item-3.jpg" alt="">
                                <div class="item-overlay">
                                    <a class="add-to-wishlist" href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                    <div class="size-addToCart">
                                        <div class="size">
                                            <span>40</span>
                                            <span>35</span>
                                            <span class="active">36</span>
                                            <span>37</span>
                                            <span>38</span>
                                            <span>39</span>
                                        </div>
                                        <a href="" class="btn">В кошик</a>
                                    </div>

                                </div>
                            </div>
                            <div class="stars">
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="prod-title">
                                <a href="">Reabook Classic</a>
                            </div>
                            <div class="prod-price">
                                <span class="old-price"> 2000 грн </span>
                                <span> 1800 грн </span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="prod-item">
                            <div class="prod-img">
                                <div class="label sale">Sale</div>
                                <img src="/img/products/medium/item-4.jpg" alt="">
                                <div class="item-overlay">
                                    <a class="add-to-wishlist" href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                    <div class="size-addToCart">
                                        <div class="size">
                                            <span>40</span>
                                            <span>35</span>
                                            <span class="active">36</span>
                                            <span>37</span>
                                            <span>38</span>
                                            <span>39</span>
                                        </div>
                                        <a href="" class="btn">В кошик</a>
                                    </div>

                                </div>
                            </div>
                            <div class="stars">
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="prod-title">
                                <a href="">Reabook Classic</a>
                            </div>
                            <div class="prod-price">
                                <span class="old-price"> 2000 грн </span>
                                <span> 1800 грн </span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="prod-item">
                            <div class="prod-img">
                                <div class="label sale">Sale</div>
                                <img src="/img/products/medium/item-5.jpg" alt="">
                                <div class="item-overlay">
                                    <a class="add-to-wishlist" href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                    <div class="size-addToCart">
                                        <div class="size">
                                            <span>40</span>
                                            <span>35</span>
                                            <span class="active">36</span>
                                            <span>37</span>
                                            <span>38</span>
                                            <span>39</span>
                                        </div>
                                        <a href="" class="btn">В кошик</a>
                                    </div>

                                </div>
                            </div>
                            <div class="stars">
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="prod-title">
                                <a href="">Reabook Classic</a>
                            </div>
                            <div class="prod-price">
                                <span class="old-price"> 2000 грн </span>
                                <span> 1800 грн </span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="prod-item">
                            <div class="prod-img">
                                <div class="label sale">Sale</div>
                                <img src="/img/products/medium/item-6.jpg" alt="">
                                <div class="item-overlay">
                                    <a class="add-to-wishlist" href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                    <div class="size-addToCart">
                                        <div class="size">
                                            <span>40</span>
                                            <span>35</span>
                                            <span class="active">36</span>
                                            <span>37</span>
                                            <span>38</span>
                                            <span>39</span>
                                        </div>
                                        <a href="" class="btn">В кошик</a>
                                    </div>

                                </div>
                            </div>
                            <div class="stars">
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="prod-title">
                                <a href="">Reabook Classic</a>
                            </div>
                            <div class="prod-price">
                                <span class="old-price"> 2000 грн </span>
                                <span> 1800 грн </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="show-all-products">
                <a href="">Переглянути усі</a>
            </div>
        </div>
    </div>

    <div class="home-prod-slider">
        <div class="container">
            <div class="slider-products-section">
                <div class="slider-products-header">
                    Топ продаж
                </div>
                <div class="owl-carousel owl-theme owl-products" id="top-products">
                    <div>
                        <div class="prod-item">
                            <div class="prod-img">
                                <div class="label top">Top</div>
                                <img src="/img/products/medium/item-7.jpg" alt="">
                                <div class="item-overlay">
                                    <a class="add-to-wishlist" href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                    <div class="size-addToCart">
                                        <div class="size">
                                            <span>40</span>
                                            <span>35</span>
                                            <span class="active">36</span>
                                            <span>37</span>
                                            <span>38</span>
                                            <span>39</span>
                                        </div>
                                        <a href="" class="btn">В кошик</a>
                                    </div>

                                </div>
                            </div>
                            <div class="stars">
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="prod-title">
                                <a href="">Reabook Classic</a>
                            </div>
                            <div class="prod-price">
                                <span class="old-price"> 2000 грн </span>
                                <span> 1800 грн </span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="prod-item">
                            <div class="prod-img">
                                <div class="label top">Top</div>
                                <img src="/img/products/medium/item-1.jpg" alt="">
                                <div class="item-overlay">
                                    <a class="add-to-wishlist" href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                    <div class="size-addToCart">
                                        <div class="size">
                                            <span>40</span>
                                            <span>35</span>
                                            <span class="active">36</span>
                                            <span>37</span>
                                            <span>38</span>
                                            <span>39</span>
                                        </div>
                                        <a href="" class="btn">В кошик</a>
                                    </div>

                                </div>
                            </div>
                            <div class="stars">
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="prod-title">
                                <a href="">Reabook Classic</a>
                            </div>
                            <div class="prod-price">
                                <span class="old-price"> 2000 грн </span>
                                <span> 1800 грн </span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="prod-item">
                            <div class="prod-img">
                                <div class="label top">Top</div>
                                <img src="/img/products/medium/item-2.jpg" alt="">
                                <div class="item-overlay">
                                    <a class="add-to-wishlist" href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                    <div class="size-addToCart">
                                        <div class="size">
                                            <span>40</span>
                                            <span>35</span>
                                            <span class="active">36</span>
                                            <span>37</span>
                                            <span>38</span>
                                            <span>39</span>
                                        </div>
                                        <a href="" class="btn">В кошик</a>
                                    </div>

                                </div>
                            </div>
                            <div class="stars">
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="prod-title">
                                <a href="">Reabook Classic</a>
                            </div>
                            <div class="prod-price">
                                <span class="old-price"> 2000 грн </span>
                                <span> 1800 грн </span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="prod-item">
                            <div class="prod-img">
                                <div class="label top">Top</div>
                                <img src="/img/products/medium/item-3.jpg" alt="">
                                <div class="item-overlay">
                                    <a class="add-to-wishlist" href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                    <div class="size-addToCart">
                                        <div class="size">
                                            <span>40</span>
                                            <span>35</span>
                                            <span class="active">36</span>
                                            <span>37</span>
                                            <span>38</span>
                                            <span>39</span>
                                        </div>
                                        <a href="" class="btn">В кошик</a>
                                    </div>

                                </div>
                            </div>
                            <div class="stars">
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="prod-title">
                                <a href="">Reabook Classic</a>
                            </div>
                            <div class="prod-price">
                                <span class="old-price"> 2000 грн </span>
                                <span> 1800 грн </span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="prod-item">
                            <div class="prod-img">
                                <div class="label top">Top</div>
                                <img src="/img/products/medium/item-4.jpg" alt="">
                                <div class="item-overlay">
                                    <a class="add-to-wishlist" href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                    <div class="size-addToCart">
                                        <div class="size">
                                            <span>40</span>
                                            <span>35</span>
                                            <span class="active">36</span>
                                            <span>37</span>
                                            <span>38</span>
                                            <span>39</span>
                                        </div>
                                        <a href="" class="btn">В кошик</a>
                                    </div>

                                </div>
                            </div>
                            <div class="stars">
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="prod-title">
                                <a href="">Reabook Classic</a>
                            </div>
                            <div class="prod-price">
                                <span class="old-price"> 2000 грн </span>
                                <span> 1800 грн </span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="prod-item">
                            <div class="prod-img">
                                <div class="label top">Top</div>
                                <img src="/img/products/medium/item-5.jpg" alt="">
                                <div class="item-overlay">
                                    <a class="add-to-wishlist" href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                    <div class="size-addToCart">
                                        <div class="size">
                                            <span>40</span>
                                            <span>35</span>
                                            <span class="active">36</span>
                                            <span>37</span>
                                            <span>38</span>
                                            <span>39</span>
                                        </div>
                                        <a href="" class="btn">В кошик</a>
                                    </div>

                                </div>
                            </div>
                            <div class="stars">
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="prod-title">
                                <a href="">Reabook Classic</a>
                            </div>
                            <div class="prod-price">
                                <span class="old-price"> 2000 грн </span>
                                <span> 1800 грн </span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="prod-item">
                            <div class="prod-img">
                                <div class="label top">Top</div>
                                <img src="/img/products/medium/item-6.jpg" alt="">
                                <div class="item-overlay">
                                    <a class="add-to-wishlist" href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                    <div class="size-addToCart">
                                        <div class="size">
                                            <span>40</span>
                                            <span>35</span>
                                            <span class="active">36</span>
                                            <span>37</span>
                                            <span>38</span>
                                            <span>39</span>
                                        </div>
                                        <a href="" class="btn">В кошик</a>
                                    </div>

                                </div>
                            </div>
                            <div class="stars">
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="prod-title">
                                <a href="">Reabook Classic</a>
                            </div>
                            <div class="prod-price">
                                <span class="old-price"> 2000 грн </span>
                                <span> 1800 грн </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="show-all-products">
                <a href="">Переглянути усі</a>
            </div>
        </div>
    </div>


@endsection