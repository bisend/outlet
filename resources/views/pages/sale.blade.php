@extends('layout')

@section('content')

    <div class="breadcrumb-default">
        <div class="container">
            <h1>{{ trans('home.sale') }} <span>{{ $model->countProducts }}</span></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url_home($model->language) }}">
                        {{ trans('layout.home_page') }}
                    </a>
                </li>
                <li class="breadcrumb-item">
                    {{ trans('home.sale') }}
                </li>
            </ol>
        </div>
    </div>


    <div id="product-grid" class="search-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="grid-header">
                        <div data-grid-select class="gridSelect">
                            {{ trans('layout.sort') }}
                            <div class="select-default">
                                <v-select
                                          v-model="productGrid.selected"
                                          :placeholder="'{{ trans('layout.default') }}'"
                                          :searchable="false"
                                          :on-change="setView('{{$model->view}}')"
                                          :options="productGrid.sortItems"
                                          label="name">
                                </v-select>
                            </div>
                        </div>

                    </div>
                    <div class="grid-item">
                        <div class="row">
                            @if($model->products->count() > 0)
                                @php($counter = 0)
                                @foreach($model->products as $product)
                                    <div class="col-sm-12 col-md-6 col-lg-3">
                                        <div class="prod-item">
                                            <a href="{{ url_product($product->slug, $model->language) }}" class="prod-img">
                                                @if(!is_null($product->promotions) && $product->promotions->count() > 0)
                                                    @if($product->promotions[0]->priority == 3)
                                                        <div class="label sale">
                                                            <span> Sale </span>
                                                        </div>
                                                    @endif
                                                    @if($product->promotions[0]->priority == 1)
                                                        <div class="label new">
                                                            <span> New </span>
                                                        </div>
                                                    @endif
                                                    @if($product->promotions[0]->priority == 2)
                                                        <div class="label top">
                                                            <span> Top </span>
                                                        </div>
                                                    @endif
                                                @endif
                                                <img src="{{ $product->images[0]->medium }}" alt="{{ $product->name }}">
                                                <div class="item-overlay">
                                                    {{--<a class="add-to-wishlist" href="">--}}
                                                    {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    <div class="add-to-wishlist" href="">
                                                        <i class="fas fa-heart"></i>
                                                    </div>

                                                    <div class="size-addToCart">
                                                        <div class="size">
                                                            <span v-for="size in productGrid.products['{{$counter}}'].sizes"
                                                                  @click="changeCurrentSizeId({{$counter}}, size.id)"
                                                                  :class="{'active': size.id == productGrid.products[{{$counter}}].currentSizeId}">
                                                                @{{ size.name }}
                                                            </span>
                                                        </div>
                                                        <div href="#"
                                                           @click.prevent="addToCart(productGrid.products[{{$counter}}].id, productGrid.products[{{$counter}}].currentSizeId, 1)"
                                                           class="btn"
                                                           :class="{'active': findWhere(cart.cartItems, {'productId': productGrid.products[{{$counter}}].id, 'sizeId': productGrid.products[{{$counter}}].currentSizeId})}">
                                                            <span v-cloak
                                                                  v-if="!findWhere(cart.cartItems, {'productId': productGrid.products['{{$counter}}'].id, 'sizeId': productGrid.products['{{$counter}}'].currentSizeId})">
                                                                {{ trans('layout.add_to_cart') }}
                                                            </span>
                                                            <span v-cloak v-else>
                                                                {{ trans('layout.in_cart') }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
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
                                    @php($counter++)
                                @endforeach
                            @else
                                <h2 class="no-products">{{ trans('layout.no_products') }}</h2>
                            @endif


                        </div>
                    </div>

                    @php($pages = \App\Helpers\Paginator::createPagination($model->page, $model->limit, $model->countProducts))
                    @php($isPrev = array_shift($pages))
                    @php($isNext = array_pop($pages))
                    @if($model->countProducts > $model->limit)
                        <div class="pagination-default">
                            <ul class="pagination">

                                {{--PREV PAGE--}}
                                @if($isPrev)
                                    <li class="page-item">
                                        <a class="page-link previous"
                                           href="{{ url_sale_per_page($model->sort, $model->page - 1, $model->language) }}"
                                           aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link previous"
                                           aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                @endif

                                {{--MAIN LINKS--}}
                                @foreach($pages as $page)

                                    @if($page == '...')
                                        <li class="page-item">
                                            <a class="page-link">
                                                {{ $page }}
                                            </a>
                                        </li>
                                    @else
                                        @if($page == $model->page)
                                            <li class="page-item  {{ $page == $model->page ? 'active' : '' }}">
                                                <a class="page-link">
                                                    {{ $page }}
                                                </a>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a href="{{ url_sale_per_page($model->sort, $page, $model->language) }}"
                                                   class="page-link">
                                                    {{ $page }}
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                @endforeach



                                {{--NEXT PAGE--}}
                                @if($isNext)
                                    <li class="page-item">
                                        <a class="page-link next"
                                           href="{{ url_sale_per_page($model->sort, $model->page + 1, $model->language) }}"
                                           aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link next"
                                           aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection