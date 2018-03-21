@extends('layout')

@section('content')
    @include('partial.breadcrumbs')
    <div class="order-section">
        <div class="container">
            <div class="payment-header">
                <div class="order-title">
                    Замовлення № <span>234124</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-7">
                    <div class="order-info-item">
                        <div class="order-info-header">
                            Деталі замовдення
                        </div>
                        <div class="order-info-body payment-body">
                            <ul class="order-details">
                                <li>Ім'я: <span>Yanchuk Serhiy</span></li>
                                <li>Фамілія: <span>Yanchuk Serhiy</span></li>
                                <li>Електронна адеса: <span>yanchuk96@gmail.com</span></li>
                                <li>Номер телефону: <span>0680397315</span></li>
                                <li>Спосіб доставки: <span>Нова пошта</span></li>
                                <li>Адреса доставки: <span>Острог, від. №1</span></li>
                                <li>Товарів: <span>3</span></li>
                                <li>Сумма замовлення: <span>5000 грн</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="order-info-item">
                        <div class="order-info-header">
                            Оплата
                        </div>
                        <div class="order-info-body payment-body">
                            <div class="LiqPay-payment">
                               Оплата картой Visa/MasterCard (LiqPay)::Payment via Visa / MasterCard (LiqPay)
                            </div>
                            <div class="payment-order">
                                <button type="submit" class="btn"><i class="fas fa-credit-card"></i> Оплатити</button>
                            </div>
                        </div>
                    </div>
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