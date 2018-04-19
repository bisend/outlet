<div class="modal fade default-modal cartModal" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Кошик</h5>
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
                            <div class="quantity">
                                <button class="quantity-btn minus"><i class="fas fa-minus"></i></button>
                                <input type="text" name="quantity" title="Количество" class="qty" value="1">
                                <button class="quantity-btn plus"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="prod_total-price">
                            <span>3000 грн</span>
                        </div>
                        <div class="delete_prod">
                            <a href=""><i class="far fa-trash-alt"></i></a>
                        </div>
                    </div>
                @endfor
                <div class="cart-footer">
                    <div class="total_count_price">
                        <div class="cart_total-count">
                            Всього товарів: <span>3</span>
                        </div>
                        <div class="cart_total-price">
                            Сумма: <span>4000 грн</span>
                        </div>
                    </div>
                    <div class="cart_btn">
                        <a href="" class="btn">Оформити замовлення</a>
                        <a href="" class="btn">Продовжити покупки</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>