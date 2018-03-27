@extends('layout')

@section('content')

    @include('partial.breadcrumbs')

    <div class="product-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7">
                    <div class="owl-carousel owl-theme product-big-photo">
                        <div>
                            <div class="prod-big-img">
                                <img src="/image/products/item-06.jpg" alt="">
                            </div>
                        </div>
                        <div>
                            <div class="prod-big-img">
                                <img src="/image/products/item-1.jpg" alt="">
                            </div>
                        </div>
                        <div>
                            <div class="prod-big-img">
                                <img src="/image/products/item-3.jpg" alt="">
                            </div>
                        </div>
                        <div>
                            <div class="prod-big-img">
                                <img src="/image/products/item-4.jpg" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="owl-carousel owl-theme product-big-photo-dots">
                        @for($i = 0; $i < 12; $i++)
                            <div class="item">
                                <div class="photo-dots">
                                    <a href="">
                                        <img src="/image/products/item-4.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        @endfor
                    </div>

                </div>
                <div class="col-md-12 col-lg-5">
                    <div class="product-info">
                        <div class="stars-comments">
                            <div class="stars">
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span class="active"><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="comments-link">
                                <a href="">Всього відгуків : <span>1</span></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <span class="price">
                                1800 грн
                            </span>
                            <span class="old-price"> 2000 грн </span>
                        </div>
                        <div class="product-characteristics">
                            <ul>
                                <li>Наявність: <span class="instok green">В наявності</span></li>
                                <li>Матеріал: <span>Шкіра</span></li>
                                <li>Виробник: <span>Україна</span></li>
                                <li>Колір: <span>Чоний</span></li>
                                <li>Артикул: <span>DD-060114</span></li>
                            </ul>
                        </div>
                        <div class="product-size">
                            <p>Оберіть розмір:</p>
                            <div class="size">
                                <span>40</span>
                                <span>35</span>
                                <span class="active">36</span>
                                <span>37</span>
                                <span>38</span>
                                <span>39</span>
                            </div>
                            <a href="">Таблиця розмірів</a>
                        </div>
                        <div class="quantity">
                            <button class="quantity-btn minus"><i class="fas fa-minus"></i></button>
                            <input type="text" name="quantity" title="Количество" class="qty" value="1">
                            <button class="quantity-btn plus"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="product-btns">
                            <div class="addTo-cart">
                                <a href="" class="btn">Додати в кошик</a>
                            </div>
                            <div class="addTo-wishlist">
                                <a href="" class="wishlist-btn"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="prodDescription-Comments">
                <nav>
                    <div class="nav nav-tabs" id="prodDescription-Comments" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                           href="#nav-description" role="tab" aria-controls="nav-home" aria-selected="true">
                            Опис
                        </a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                           href="#nav-comments" role="tab" aria-controls="nav-profile" aria-selected="false">
                            Відгуки (<span>2</span>)
                        </a>
                    </div>
                </nav>
                <div class="tab-content" id="prodDescription-Comments-Content">
                    <div class="tab-pane fade show active tab-description" id="nav-description" role="tabpanel" aria-labelledby="nav-home-tab">
                        Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться.
                        Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона,
                        а также реальное распределение букв и пробелов в абзацах, которое не получается при простой
                        дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы
                        электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по
                        умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как
                        много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст
                        Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые -
                        намеренно (например, юмористические варианты).
                    </div>
                    <div class="tab-pane fade tab-comments" id="nav-comments" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="add-comment-link2">
                            <a href="" >Додати відгук</a>
                        </div>
                        <p>Всього відгуків (<span>2</span>) або "Відгуки відсутні"</p>
                        <div class="comment-item">
                            <div class="comment-item_header">
                                <div class="user_stars">
                                    <div class="user-name">
                                        Yanchuk Serhiy
                                    </div>
                                    <div class="stars">
                                        <span class="active"><i class="fas fa-star"></i></span>
                                        <span class="active"><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                    </div>
                                </div>
                                <div class="comment-date">
                                    15.03.2018
                                </div>
                            </div>
                            <div class="comment-item_text">
                                Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum
                                является стандартной "рыбой" для текстов на латинице с начала XVI века.
                            </div>
                        </div>
                        <div class="comment-item">
                            <div class="comment-item_header">
                                <div class="user_stars">
                                    <div class="user-name">
                                        Yanchuk Serhiy
                                    </div>
                                    <div class="stars">
                                        <span class="active"><i class="fas fa-star"></i></span>
                                        <span class="active"><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                    </div>
                                </div>
                                <div class="comment-date">
                                    15.03.2018
                                </div>
                            </div>
                            <div class="comment-item_text">
                                Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum
                                является стандартной "рыбой" для текстов на латинице с начала XVI века.
                            </div>
                        </div>

                        @include('partial.pagination')

                        <div class="add-comment-block">
                            <p>Додати відгук</p>
                            <form action="">
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <div class="input-group-default">
                                            <label for="comment-name">Введіть ваше Ім'я :</label>
                                            <input type="text" class="input-default" id="comment-name" placeholder="Ім'я">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <div class="input-group-default incorect-input">
                                            <label for="comment-email">Обов'язкове поле :</label>
                                            <input type="email" class="input-default" id="comment-email" placeholder="Електронна адреса">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="add-comment-stars">
                                            <span class="click-star">Оцінка : </span>
                                            <div class="stars">
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                            </div>
                                            <span class="incorect-stars">Оцініть товар!</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="input-group-default">
                                            <label for="comment-text">Ваш відгук :</label>
                                            <textarea id="comment-text" placeholder="Ваш відгук"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="send-comment">
                                    <button class="btn">Відправити</button>
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