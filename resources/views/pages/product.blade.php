@extends('layout')

@section('content')

    <div class="breadcrumb-default">
        <div class="container">
            <h1>{{ $model->product->name }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url_home($model->language) }}">
                        {{ trans('layout.home_page') }}
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url_category($model->product_category->slug, $model->language) }}">
                        {{ $model->product_category->name }}
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    {{ $model->product->name }}
                </li>
            </ol>
        </div>
    </div>

    <div class="product-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7">
                    <div class="owl-carousel owl-theme product-big-photo">
                        @foreach($model->product->images as $image)
                            <div>
                                <div class="prod-big-img">

                                    @if(!is_null($model->product->promotions) && $model->product->promotions->count() > 0)
                                        @if($model->product->promotions[0]->priority == 3)
                                            <div class="label sale">
                                                <span> Sale </span>
                                            </div>
                                        @endif
                                        @if($model->product->promotions[0]->priority == 1)
                                            <div class="label new">
                                                <span> New </span>
                                            </div>
                                        @endif
                                        @if($model->product->promotions[0]->priority == 2)
                                            <div class="label top">
                                                <span> Top </span>
                                            </div>
                                        @endif
                                    @endif
                                    <img src="{{ $image->big }}" alt="{{ $model->product->name }}">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="owl-carousel owl-theme product-big-photo-dots">
                        @foreach($model->product->images as $image)
                            <div class="item">
                                <div class="photo-dots">
                                    <a href="#">
                                        <img src="{{ $image->small }}" alt="{{ $model->product->name }}">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-md-12 col-lg-5" id="single-product-info-container">
                    <div class="product-info">
                        <div class="stars-comments">
                            <div class="stars">
                                @for($i = 1; $i <= 5; $i++)
                                    @if(!is_null($model->product->rating))
                                        @if($i <= $model->product->rating)
                                            <span class="active"><i class="fas fa-star"></i></span>
                                        @else
                                            <span><i class="fas fa-star"></i></span>
                                        @endif
                                    @else
                                        <span><i class="fas fa-star"></i></span>
                                    @endif
                                @endfor
                            </div>
                            <div class="comments-link">
                                <a href="#" @click.prevent="scrollToReview">{{ trans('product.reviews_total') }} :
                                    <span v-cloak>@{{ singleProductPage.reviews_total_count }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="product-price">
                            <span> {{ $model->product->price }} грн </span>
                            @if(!is_null($model->product->old_price))
                                <span class="old-price"> {{ $model->product->old_price }} грн </span>
                            @endif
                        </div>
                        <div class="product-characteristics">
                            <ul>
                                <li>{{ trans('product.stock') }}:
                                    @if($model->product->in_stock)
                                        <span class="instok green">{{ trans('product.in_stock') }}</span>
                                    @else
                                        <span class="instok red">{{ trans('product.not_in_stock') }}</span>
                                    @endif
                                </li>
                                @foreach($model->product->properties as $product_property)
                                    @if($product_property->slug != 'razmer')
                                        <li>
                                            {{ $product_property->property_name }}: <span>{{ $product_property->property_value }}</span>
                                        </li>
                                    @endif
                                @endforeach
                                <li>Артикул: <span>{{ $model->product->vendor_code }}</span></li>
                            </ul>
                        </div>
                        <div class="product-size">
                            <p>{{ trans('product.choose_size') }}:</p>
                            <div class="size">
                                @php($counter = 0)
                                @foreach($model->product->sizes as $size)
                                    @if($counter == 0)
                                        <span v-on:click.prevent="changeSizeId('{{ $size->id }}')"
                                              :class="{active : singleProductPage.sizeId == {{$size->id}}}">
                                            {{ $size->name }}
                                        </span>
                                    @else
                                        <span v-on:click.prevent="changeSizeId('{{ $size->id }}')"
                                              :class="{active : singleProductPage.sizeId == {{$size->id}}}">
                                            {{ $size->name }}
                                        </span>
                                    @endif
                                    @php($counter++)
                                @endforeach
                            </div>
                            <a href="">{{ trans('product.size_table') }}</a>
                        </div>
                        <div class="quantity">
                            <button v-on:click="decrement()"
                                    class="quantity-btn minus"><i class="fas fa-minus"></i></button>
                            <input type="text"
                                   v-model.number="singleProductPage.count"
                                   v-on:change="toInteger(singleProductPage.count)"
                                   name="quantity"
                                   title="Количество"
                                   class="qty">
                            <button v-on:click="increment()"
                                    class="quantity-btn plus"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="product-btns">
                            <div class="addTo-cart">
                                <a data-toggle="modal" data-target="#cartModal" href="#"
                                   v-on:click.prevent="addToCart(singleProductPage.product.id, singleProductPage.sizeId, singleProductPage.count)"
                                   class="btn"
                                   :class="{'active': findWhere(cart.cartItems, {'productId': singleProductPage.product.id, 'sizeId': singleProductPage.sizeId})}">
                                    <span v-cloak
                                          v-if="!findWhere(cart.cartItems, {'productId': singleProductPage.product.id, 'sizeId': singleProductPage.sizeId})">
                                        {{ trans('product.add_to_cart') }}
                                    </span>
                                    <span v-cloak v-else>
                                        {{ trans('layout.in_cart') }}
                                    </span>
                                </a>
                            </div>
                            <div class="addTo-wishlist">
                                <a href="" class="wishlist-btn"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div id="single-product-reviews-description" class="prodDescription-Comments">
                <nav>
                    <div class="nav nav-tabs" id="prodDescription-Comments" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                           href="#nav-description" role="tab" aria-controls="nav-home" aria-selected="true">
                            {{ trans('product.description') }}
                        </a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                           href="#nav-comments" role="tab" aria-controls="nav-profile" aria-selected="false">
                            {{ trans('product.reviews') }} (<span v-cloak>@{{ singleProductPage.reviews_total_count }}</span>)
                        </a>
                    </div>
                </nav>
                <div class="tab-content" id="prodDescription-Comments-Content">
                    <div class="tab-pane fade show active tab-description" id="nav-description" role="tabpanel" aria-labelledby="nav-home-tab">
                        {!! $model->product->description !!}
                    </div>
                    <div class="tab-pane fade tab-comments" id="nav-comments" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="add-comment-link2">
                            <a href="#" @click.prevent="scrollToReview">{{ trans('product.add_review') }}</a>
                        </div>
                        <p v-if="singleProductPage.reviews_total_count > 0">
                            {{ trans('product.reviews_total') }} (<span>@{{ singleProductPage.reviews_total_count }}</span>)
                        </p>
                        <p v-else>
                            {{ trans('product.reviews_none') }}
                        </p>

                        <div v-if="singleProductPage.reviews_total_count" v-for="review in singleProductPage.reviews" class="comment-item">
                            <div class="comment-item_header">
                                <div class="user_stars">
                                    <div class="user-name">
                                        @{{ review.name }}
                                    </div>
                                    <div class="stars">
                                        <span v-for="rate in 5" :class="{active: rate <= review.rating}">
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="comment-date">
                                    @{{ review.created_at }}
                                </div>
                            </div>
                            <div class="comment-item_text">
                                @{{ review.review }}
                            </div>
                        </div>

                        {{--PAGINATION REVIEWS--}}
                        <div v-cloak v-if="singleProductPage.reviews_total_count > 5" class="pagination-default">
                            <ul class="pagination">

                                <li v-if="singleProductPage.reviewIsPrev" class="page-item">
                                    <a @click="setPage(singleProductPage.reviewsCurrentPage - 1)"
                                       class="page-link previous" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li v-else class="page-item">
                                    <a class="page-link previous"
                                       style="cursor: pointer;"
                                       aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>

                                <li v-for="reviewPage in singleProductPage.reviewsPages" class="page-item"
                                    :class="{active : reviewPage == singleProductPage.reviewsCurrentPage}">
                                    <a v-if="reviewPage == '...'" class="page-link">
                                        @{{ reviewPage }}
                                    </a>
                                    <a v-else class="page-link"
                                       @click="setPage(reviewPage)">
                                        @{{ reviewPage }}
                                    </a>
                                </li>

                                <li v-if="singleProductPage.reviewIsNext" class="page-item">
                                    <a @click="setPage(singleProductPage.reviewsCurrentPage + 1)"
                                       class="page-link next" aria-label="Previous">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                                <li v-else class="page-item">
                                    <a class="page-link next"
                                       style="cursor: pointer;"
                                       aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="add-comment-block" data-review-form>
                            <p>{{ trans('product.add_review') }}</p>
                            <form method="post" @submit.prevent="validateBeforeSubmit">
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <div class="input-group-default">
                                            <label for="comment-name">Введіть ваше Ім'я :</label>
                                            <input data-review-name
                                                   v-model="singleProductPage.name"
                                                   type="text" class="input-default" id="comment-name" placeholder="Ім'я">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <div class="input-group-default">
                                            <label for="comment-email">Email :</label>
                                            <input data-review-email
                                                   v-model="singleProductPage.email"
                                                   type="email" class="input-default" id="comment-email" placeholder="Електронна адреса">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="add-comment-stars">
                                            <span class="click-star">{{ trans('product.rate') }} : </span>
                                            <div class="stars">
                                                <span v-on:mouseover="hoverStars(1)"
                                                      v-on:mouseleave="mouseLeave()"
                                                      v-on:click="clickStars(1)"
                                                       :class="{active: singleProductPage.hoverRating >= 1 || singleProductPage.rating >= 1}">
                                                    <i class="fas fa-star"></i>
                                                </span>
                                                <span v-on:mouseover="hoverStars(2)"
                                                      v-on:mouseleave="mouseLeave()"
                                                      v-on:click="clickStars(2)"
                                                      :class="{active: singleProductPage.hoverRating >= 2 || singleProductPage.rating >= 2}">
                                                    <i class="fas fa-star"></i>
                                                </span>
                                                <span v-on:mouseover="hoverStars(3)"
                                                      v-on:mouseleave="mouseLeave()"
                                                      v-on:click="clickStars(3)"
                                                      :class="{active: singleProductPage.hoverRating >= 3 || singleProductPage.rating >= 3}">
                                                    <i class="fas fa-star"></i>
                                                </span>
                                                <span v-on:mouseover="hoverStars(4)"
                                                      v-on:mouseleave="mouseLeave"
                                                      v-on:click="clickStars(4)"
                                                      :class="{active: singleProductPage.hoverRating >= 4 || singleProductPage.rating >= 4}">
                                                    <i class="fas fa-star"></i>
                                                </span>
                                                <span v-on:mouseover="hoverStars(5)"
                                                      v-on:mouseleave="mouseLeave"
                                                      v-on:click="clickStars(5)"
                                                      :class="{active: singleProductPage.hoverRating >= 5 || singleProductPage.rating >= 5}">
                                                    <i class="fas fa-star"></i>
                                                </span>
                                            </div>
                                            <span v-if="singleProductPage.validatedFalse" class="incorect-stars">
                                                {{ trans('product.pls_rate') }}!
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="input-group-default">
                                            <label for="comment-text">Ваш відгук :</label>
                                            <textarea data-review-text
                                                      v-model="singleProductPage.text"
                                                      id="comment-text" placeholder="Ваш відгук"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="send-comment">
                                    <button class="btn">{{ trans('product.send') }}</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>

            @include('partial.owlSliderProducts')

        </div>
    </div>
@endsection