<div class="modal fade default-modal cartModal orderModal" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Замовлення №231242</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                @for($i = 0; $i < 3; $i++)
                    <div class="cart-item">
                        <div class="img_info">
                            <div class="img">
                                <div class="label new">New</div>
                                <a href=""><img src="/image/products/item-2.jpg" alt=""></a>
                            </div>
                            <div class="info">
                                <div class="prod_title">
                                    <a href="">Reabook Classic</a>
                                </div>
                                <div class="prod-price">
                                    <span class="old-price"> 2000 грн </span>
                                    <span> 1800 грн </span>
                                </div>
                            </div>
                        </div>
                        <div class="prod_count">
                           x <span>3</span>
                        </div>
                        <div class="prod_total-price">
                            <span>3000 грн</span>
                        </div>
                    </div>
                @endfor
                <div class="order-info">
                    <ul>
                        <li>
                            Ім'я, прізвище: <span>Serhiy Yanchuk</span>
                        </li>
                        <li>
                            Номер телефону: <span>0680397461</span>
                        </li>
                        <li>
                            Електрона адреса: <span>yanchuk@gmail.com</span>
                        </li>
                        <li>
                            Дата замовлення: <span>22.09.2018</span>
                        </li>
                        <li>
                            Спосіб оплати: <span>Готівна</span>
                        </li>
                        <li>
                            Спосіб доставки: <span>Нова пошта</span>
                        </li>
                        <li>
                            Адреса доставки: <span>Рівне</span>
                        </li>
                        <li>
                            Кількість товарів: <span>10</span>
                        </li>
                        <li>
                            Сумма замовлення: <span>10000 грн</span>
                        </li>
                    </ul>
                    <div class="close-order-modal">
                        <a href="javascript:void(0);" class="btn" data-dismiss="modal" aria-label="Close">Закрити</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>