@extends('layout')

@section('content')
    @include('partial.breadcrumbs')

    <div class="profile-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="profile-nav">
                        <ul>
                            <li>
                                <a  href="/profile/personal-info">Особисті дані</a>
                            </li>
                            <li>
                                <a class="active" href="/profile/wishlist">Обране</a>
                            </li>
                            <li>
                                <a href="/profile/my-orders">Мої замовлення</a>
                            </li>
                            <li>
                                <a href="">Вихід</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <div class="profile-item">
                        <div class="profile-header">
                            Обране
                        </div>
                        <div class="profile-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-4">
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

                                <div class="col-sm-12 col-md-12 col-lg-4">
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

                                <div class="col-sm-12 col-md-12 col-lg-4">
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

                                <div class="col-sm-12 col-md-12 col-lg-4">
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

                                <div class="col-sm-12 col-md-12 col-lg-4">
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

                                <div class="col-sm-12 col-md-12 col-lg-4">
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

                                @include('partial.pagination')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection