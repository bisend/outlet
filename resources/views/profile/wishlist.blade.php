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
                                <div class="col-sm-12">
                                    <div class="wishlist-prod-item">
                                        <div class="wishlist-prod-img-info">
                                            <div class="wishlist-prod-img">
                                                <a href=""><img src="/image/products/item-06.jpg" alt=""></a>                                            </div>
                                            <div class="wishlist-prod-info">
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
                                        <div class="wishlist-delete">
                                            <a href=""><i class="far fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="wishlist-prod-item">
                                        <div class="wishlist-prod-img-info">
                                            <div class="wishlist-prod-img">
                                                <div class="label sale">Sale</div>
                                                <a href=""><img src="/image/products/item-06.jpg" alt=""></a>                                            </div>
                                            <div class="wishlist-prod-info">
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
                                        <div class="wishlist-delete">
                                            <a href=""><i class="far fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="wishlist-prod-item">
                                        <div class="wishlist-prod-img-info">
                                            <div class="wishlist-prod-img">
                                                <div class="label new">New</div>
                                                <a href=""><img src="/image/products/item-06.jpg" alt=""></a>
                                            </div>
                                            <div class="wishlist-prod-info">
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
                                        <div class="wishlist-delete">
                                            <a href=""><i class="far fa-trash-alt"></i></a>
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