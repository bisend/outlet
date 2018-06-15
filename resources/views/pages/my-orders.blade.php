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
                                <a href="/profile/wishlist">Обране</a>
                            </li>
                            <li>
                                <a class="active" href="/profile/my-orders">Мої замовлення</a>
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
                            Мої замовлення
                        </div>
                        <div class="profile-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr class="order-list-header">
                                        <th>№</th>
                                        <th>Статус</th>
                                        <th>К-сть</th>
                                        <th>Сумма</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="item-list-order">
                                        <td>
                                            <div class="order-number">
                                                <a data-toggle="modal" data-target="#orderModal" href="javascript:void(0);" class="fsz-16 font-2">10002</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="order-status">
                                                    <span>Новый</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="order-total-count">
                                                    <span>1</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="order-total-summ">
                                                    <span>1220.00 грн</span>
                                            </div>
                                        </td>
                                        <td class="view-order-details">
                                            <a data-toggle="modal" data-target="#orderModal" href="javascript:void(0);">
                                                Детальніше...
                                            </a>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection