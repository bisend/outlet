<div id="similar-products" class="slider-products-section">
    <div class="slider-products-header">
        {{ trans('product.similar_products') }}
    </div>
    <div class="owl-carousel owl-theme owl-products owl-similar-products" id="same-products">
        @php($counter = 0)
        @foreach($model->similar_products as $similar_product)
            <div>
                <div class="prod-item">
                    <div class="prod-img">
                        @if(!is_null($similar_product->promotions) && $similar_product->promotions->count() > 0)
                            @if($similar_product->promotions[0]->priority == 3)
                                <div class="label sale">
                                    <span> Sale </span>
                                </div>
                            @endif
                            @if($similar_product->promotions[0]->priority == 1)
                                <div class="label new">
                                    <span> New </span>
                                </div>
                            @endif
                            @if($similar_product->promotions[0]->priority == 2)
                                <div class="label top">
                                    <span> Top </span>
                                </div>
                            @endif
                        @endif
                        <img src="{{ $similar_product->images[0]->medium }}" alt="{{ $similar_product->name }}">
                        <div class="item-overlay">
                            <a class="add-to-wishlist" href="">
                                <i class="fas fa-heart"></i>
                            </a>
                            <div class="size-addToCart">
                                <div class="size">
                                    <span v-for="size in singleProductPage.similarProducts[{{$counter}}].sizes"
                                          @click="changeCurrentSizeId({{$counter}}, size.id)"
                                          :class="{'active': size.id == singleProductPage.similarProducts[{{$counter}}].currentSizeId}">
                                        @{{ size.name }}
                                    </span>
                                    {{--@php($counterSize = 0)--}}
                                    {{--@foreach($similar_product->sizes as $size)--}}
                                        {{--@if($counterSize == 0)--}}
                                            {{--<span @click.prevent="changeCurrentSizeId({{$counter}}, {{$size->id}})"--}}
                                                  {{--:class="{'active': singleProductPage.similarProducts[{{$counter}}].currentSizeId == {{$size->id}}}">--}}
                                                {{--{{ $size->name }}--}}
                                            {{--</span>--}}
                                        {{--@else--}}
                                            {{--<span @click.prevent="changeCurrentSizeId({{$counter}}, {{$size->id}})"--}}
                                                  {{--:class="{'active': singleProductPage.similarProducts[{{$counter}}].currentSizeId == {{$size->id}}}">--}}
                                                {{--{{ $size->name }}--}}
                                            {{--</span>--}}
                                        {{--@endif--}}
                                        {{--@php($counterSize++)--}}
                                    {{--@endforeach--}}
                                </div>
                                <a href="#"
                                   @click.prevent="addToCart(singleProductPage.similarProducts[{{$counter}}].id, singleProductPage.similarProducts[{{$counter}}].currentSizeId, 1)"
                                   class="btn"
                                   :class="{'active': findWhere(cart.cartItems, {'productId': singleProductPage.similarProducts[{{$counter}}].id, 'sizeId': singleProductPage.similarProducts[{{$counter}}].currentSizeId})}">
                                    <span v-cloak
                                          v-if="!findWhere(cart.cartItems, {'productId': singleProductPage.similarProducts['{{$counter}}'].id, 'sizeId': singleProductPage.similarProducts['{{$counter}}'].currentSizeId})">
                                        {{ trans('layout.add_to_cart') }}
                                    </span>
                                    <span v-cloak v-else>
                                        {{ trans('layout.in_cart') }}
                                    </span>
                                </a>
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
        @php($counter++)
        @endforeach
    </div>
</div>