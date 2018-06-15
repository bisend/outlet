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
                                <a class="active" href="/profile/personal-info">Особисті дані</a>
                            </li>
                            <li>
                                <a href="/profile/wishlist">Обране</a>
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
                            Особисті дані
                        </div>
                        <div class="profile-body">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-12 col-lg-4">
                                        <div class="input-group-default">
                                            <label for="comment-name">Ім'я :</label>
                                            <input type="text" class="input-default" id="comment-name" placeholder="Ім'я">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        <div class="input-group-default">
                                            <label for="comment-name"> Електронна адреса :</label>
                                            <input type="text" class="input-default" id="comment-name" placeholder="Електронна адреса">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        <div class="input-group-default">
                                            <label for="comment-name">Номер телефону :</label>
                                            <input type="text" class="input-default" id="comment-name" placeholder="Номер телефону">
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-btn-submit">
                                    <button class="btn">Зберегти</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="profile-item">
                        <div class="profile-header">
                            Змінити пароль
                        </div>
                        <div class="profile-body">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-12 col-lg-4">
                                        <div class="input-group-default">
                                            <label for="comment-name">Старий пароль :</label>
                                            <input type="text" class="input-default" id="comment-name" placeholder="Старий пароль">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        <div class="input-group-default">
                                            <label for="comment-name">Новий пароль :</label>
                                            <input type="text" class="input-default" id="comment-name" placeholder="Новий пароль">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        <div class="input-group-default">
                                            <label for="comment-name">Повторіть новий пароль :</label>
                                            <input type="text" class="input-default" id="comment-name" placeholder="Повторіть новий пароль">
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-btn-submit">
                                    <button class="btn">Зберегти</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection