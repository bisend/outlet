@extends('layout')

@section('content')
    @include('partial.breadcrumbs')

    <div class="search-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="grid-header">
                        <div data-grid-select class="gridSelect">
                            Сортувати
                            <div class="select-default">
                                <v-select v-model="selected"
                                          :placeholder="'За замовчуванням'"
                                          :searchable="false"
                                          :options="['За популярністю','За назвою','Ціна: за зростанням','Ціна: за спаданням']">
                                </v-select>
                            </div>
                        </div>

                    </div>
                    <div class="grid-item">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <div class="prod-item">
                                    <div class="prod-img">
                                        <div class="label new">New</div>
                                        <img src="/image/products/item-06.jpg" alt="">
                                        <div class="item-overlay">
                                            {{--<a class="add-to-wishlist" href="">--}}
                                            {{--<i class="fas fa-heart"></i>--}}
                                            {{--</a>--}}
                                            <a class="add-to-wishlist active" href="">
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
                                                <a href="" class="btn active">В кошику</a>
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

                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <div class="prod-item">
                                    <div class="prod-img">
                                        <div class="label top">Top</div>
                                        <img src="/image/products/item-06.jpg" alt="">
                                        <div class="item-overlay">
                                            <a class="add-to-wishlist" href="">
                                                <i class="fas fa-heart"></i>
                                            </a>

                                            {{--
                                                CHECK add class ACTIVE
                                            <a class="add-to-wishlist active" href="">--}}
                                            {{--<i class="fas fa-heart"></i>--}}
                                            {{--</a>--}}

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

                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <div class="prod-item">
                                    <div class="prod-img">
                                        <div class="label sale">Sale</div>
                                        <img src="/image/products/item-06.jpg" alt="">
                                        <div class="item-overlay">
                                            <a class="add-to-wishlist" href="">
                                                <i class="fas fa-heart"></i>
                                            </a>

                                            {{--
                                                CHECK add class ACTIVE
                                            <a class="add-to-wishlist active" href="">--}}
                                            {{--<i class="fas fa-heart"></i>--}}
                                            {{--</a>--}}

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

                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <div class="prod-item">
                                    <div class="prod-img">
                                        <img src="/image/products/item-06.jpg" alt="">
                                        <div class="item-overlay">
                                            <a class="add-to-wishlist" href="">
                                                <i class="fas fa-heart"></i>
                                            </a>

                                            {{--
                                                CHECK add class ACTIVE
                                            <a class="add-to-wishlist active" href="">--}}
                                            {{--<i class="fas fa-heart"></i>--}}
                                            {{--</a>--}}

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

                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <div class="prod-item">
                                    <div class="prod-img">
                                        <img src="/image/products/item-06.jpg" alt="">
                                        <div class="item-overlay">
                                            <a class="add-to-wishlist" href="">
                                                <i class="fas fa-heart"></i>
                                            </a>

                                            {{--
                                                CHECK add class ACTIVE
                                            <a class="add-to-wishlist active" href="">--}}
                                            {{--<i class="fas fa-heart"></i>--}}
                                            {{--</a>--}}

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

                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <div class="prod-item">
                                    <div class="prod-img">
                                        <img src="/image/products/item-06.jpg" alt="">
                                        <div class="item-overlay">
                                            <a class="add-to-wishlist" href="">
                                                <i class="fas fa-heart"></i>
                                            </a>

                                            {{--
                                                CHECK add class ACTIVE
                                            <a class="add-to-wishlist active" href="">--}}
                                            {{--<i class="fas fa-heart"></i>--}}
                                            {{--</a>--}}

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

                    @include('partial.pagination')

                </div>
            </div>
        </div>
    </div>

@endsection