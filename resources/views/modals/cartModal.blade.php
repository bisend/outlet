<div class="modal fade default-modal cartModal" id="big-cart" tabindex="-1" role="dialog" aria-labelledby="big-cart" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('cart.cart') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">

                    <div v-for="cartItem in cart.cartItems" class="cart-item">
                        <div class="img_info">
                            <div class="img">

                                <div v-if="cartItem.product.promotions != null && cartItem.product.promotions.length > 0 && cartItem.product.promotions[0].priority == 3"
                                     class="label sale">
                                    <span> Sale </span>
                                </div>
                                <div v-if="cartItem.product.promotions != null && cartItem.product.promotions.length > 0 && cartItem.product.promotions[0].priority == 1"
                                     class="label new">
                                    <span> New </span>
                                </div>
                                <div v-if="cartItem.product.promotions != null && cartItem.product.promotions.length > 0 && cartItem.product.promotions[0].priority == 2"
                                     class="label top">
                                    <span> Top </span>
                                </div>

                                <a :href="'/product/' + cartItem.product.slug + '/{{ $model->language == 'ru' ? '' : $model->language }}'">
                                    <img :src="cartItem.product.images[0].small" :alt="cartItem.product.name">
                                </a>
                            </div>
                            <div class="info">
                                <div class="prod_title">
                                    <a :href="'/product/' + cartItem.product.slug + '/{{ $model->language == 'ru' ? '' : $model->language }}'">
                                        @{{ cartItem.product.name }}
                                    </a>
                                </div>
                                <div class="prod-price">
                                    <span v-if="cartItem.old_price" class="old-price">
                                        @{{ cartItem.product.old_price }} грн
                                    </span>
                                    <span> @{{ cartItem.product.price }} грн </span>
                                </div>
                                {{--<div class="size-cart">--}}
                                    {{--<span>@{{ cartItem.sizeId }}</span>--}}
                                {{--</div>--}}
                                <div class="size">
                                    <span v-for="size in cartItem.product.sizes" v-if="size.id == cartItem.sizeId" class="active">
                                        @{{ size.name }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="prod_count">
                            <div class="quantity">
                                <button @click="decrement(cartItem.productId, cartItem.sizeId)"
                                        class="quantity-btn minus">
                                    <i class="fas fa-minus"></i>
                                </button>

                                <input type="text"
                                       v-model.number="cartItem.count"
                                       @change="toInteger(cartItem.productId, cartItem.sizeId, cartItem.count)"
                                       name="quantity" title="Количество" class="qty">

                                <button @click="increment(cartItem.productId, cartItem.sizeId)"
                                        class="quantity-btn plus">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="prod_total-price">
                            <span>@{{ (cartItem.product.price * cartItem.count).toFixed(2) }} грн</span>
                        </div>
                        <div class="delete_prod">
                            <a href="#" @click.prevent="deleteFromCart(cartItem.productId, cartItem.sizeId)">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </div>
                    </div>

                <div class="cart-footer">
                    <div class="total_count_price">
                        <div class="cart_total-count">
                            {{ trans('cart.products-count') }}: <span>@{{ cart.totalCount }}</span>
                        </div>
                        <div class="cart_total-price">
                            {{ trans('cart.sum') }}: <span>@{{ cart.totalAmount.toFixed(2) }} грн</span>
                        </div>
                    </div>
                    <div class="cart_btn">
                        <a href="#" class="btn">{{ trans('cart.make-order') }}</a>
                        <a href="#" class="btn" data-dismiss="modal" aria-label="Close">{{ trans('cart.continue-shopping') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>