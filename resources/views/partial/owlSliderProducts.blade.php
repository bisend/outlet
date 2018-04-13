<div class="slider-products-section">
    <div class="slider-products-header">
        {{ trans('product.similar_products') }}
    </div>
    <div class="owl-carousel owl-theme owl-products owl-similar-products" id="same-products">
        @foreach($model->similar_products as $similar_product)
            <div>
                <div class="prod-item">
                    <div class="prod-img">
                        <img src="{{ $similar_product->images[0]->medium }}" alt="{{ $similar_product->name }}">
                        <div class="item-overlay">
                            <a class="add-to-wishlist" href="">
                                <i class="fas fa-heart"></i>
                            </a>
                            <div class="size-addToCart">
                                <div class="size">
                                    @php($counter = 0)
                                    @foreach($model->product->sizes as $size)
                                        @if($counter == 0)
                                            <span class="active">{{ $size->name }}</span>
                                        @else
                                            <span>{{ $size->name }}</span>
                                        @endif
                                        @php($counter++)
                                    @endforeach
                                </div>
                                <a href="" class="btn">{{ trans('layout.add_to_cart') }}</a>
                            </div>

                        </div>
                    </div>
                    <div class="stars">
                        @for($i = 1; $i <= 5; $i++)
                            @if(!is_null($similar_product->rating))
                                @if($i <= $similar_product->rating)
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
                        <a href="{{ url_product($similar_product->slug, $model->language) }}">
                            {{ $similar_product->name }}
                        </a>
                    </div>
                    <div class="prod-price">
                        @if(!is_null($similar_product->old_price))
                            <span class="old-price"> {{ $similar_product->old_price }} грн </span>
                        @endif
                        <span> {{ $similar_product->price }} грн </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>