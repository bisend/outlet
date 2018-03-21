@extends('layout')

@section('content')
    @include('partial.breadcrumbs')
    <div class="order-section">
        <div class="container">
            <div class="order-header">
                <div class="order-title">
                    Деталі замовлення
                </div>
                <div class="edit-order">
                    <a href="" class="btn">Редагувати замовлення</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-7" data-order-form>
                    <form action="">
                    <div class="order-info-item">
                        <div class="order-info-header">
                            Контактні данні
                        </div>
                        <div class="order-info-body">

                                <div class="input-group-default">
                                    <label for="comment-name">Введіть ваше Ім'я :</label>
                                    <input type="text" class="input-default" id="comment-name" placeholder="Ім'я">
                                </div>
                                <div class="input-group-default">
                                    <label for="comment-name">Введіть номер телефону :</label>
                                    <input type="text" class="input-default" id="comment-name" placeholder="Номер телефону">
                                </div>
                                <div class="input-group-default">
                                    <label for="comment-name">Введіть електронну адресу :</label>
                                    <input type="text" class="input-default" id="comment-name" placeholder="Електронна адреса">
                                </div>
                        </div>
                    </div>

                    <div class="order-info-item">
                        <div class="order-info-header">
                            Оплата та доставка
                        </div>
                        <div class="order-info-body">
                                <div class="select-default">
                                    <v-select v-model="delivery"
                                              :placeholder="'За замовчуванням'"
                                              :searchable="false"
                                              :options="['За популярністю','За назвою','Ціна: за зростанням','Ціна: за спаданням']">
                                    </v-select>
                                </div>

                            <div class="select-default">
                                <v-select v-model="pay"
                                          :placeholder="'За замовчуванням'"
                                          :searchable="false"
                                          :options="['За популярністю','За назвою','Ціна: за зростанням','Ціна: за спаданням']">
                                </v-select>
                            </div>

                            <div class="input-group-default">
                                <label for="comment-text">Ваш відгук :</label>
                                <textarea id="comment-text" placeholder="Ваш відгук"></textarea>
                            </div>

                        </div>
                    </div>
                        <div class="submit-order">
                            <button type="submit" class="btn">Замовити</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div class="order-info-item">
                        <div class="order-info-header">
                            Ваше замовлення
                        </div>
                        <div class="order-info-body">
                            <div class="order-prod">
                                <div class="order-prod-img">
                                    <a href="">
                                        <div class="label new">New</div>
                                        <img src="/image/products/item-06.jpg" alt="">
                                    </a>
                                </div>
                                <div class="order-prod-info">
                                    <div class="prod_name">
                                        <a href="">Reabook Classic</a>
                                    </div>
                                    <div class="prod_size">
                                        <div class="size">
                                            <span class="active">36</span>
                                        </div>
                                    </div>
                                    <div class="count_price">
                                        <span class="count_prod">2 x </span><span class="price">1900 грн</span>
                                    </div>
                                    <div class="total_price">
                                        Сумма: <span>3800 грн</span>
                                    </div>
                                </div>
                            </div>

                            <div class="order-prod">
                                <div class="order-prod-img">
                                    <a href="">
                                        <div class="label new">New</div>
                                        <img src="/image/products/item-2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="order-prod-info">
                                    <div class="prod_name">
                                        <a href="">Reabook Classic</a>
                                    </div>
                                    <div class="prod_size">
                                        <div class="size">
                                            <span class="active">36</span>
                                        </div>
                                    </div>
                                    <div class="count_price">
                                        <span class="count_prod">2 x </span><span class="old-price"> 2000 грн </span><span class="price">1900 грн</span>
                                    </div>
                                    <div class="total_price">
                                        Сумма: <span>3800 грн</span>
                                    </div>
                                </div>
                            </div>

                            <div class="order-prod">
                                <div class="order-prod-img">
                                    <a href="">
                                        <div class="label new">New</div>
                                        <img src="/image/products/item-5.jpg" alt="">
                                    </a>
                                </div>
                                <div class="order-prod-info">
                                    <div class="prod_name">
                                        <a href="">Reabook Classic</a>
                                    </div>
                                    <div class="prod_size">
                                        <div class="size">
                                            <span class="active">36</span>
                                        </div>
                                    </div>
                                    <div class="count_price">
                                        <span class="count_prod">2 x </span><span class="old-price"> 2000 грн </span><span class="price">1900 грн</span>
                                    </div>
                                    <div class="total_price">
                                        Сумма: <span>3800 грн</span>
                                    </div>
                                </div>
                            </div>

                            <div class="total-order-price">
                                Сумма замовлення: <span>5100 грн</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection