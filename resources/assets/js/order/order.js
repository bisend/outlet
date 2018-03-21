if ($('[data-order-form]').length > 0)
{
    new Vue({
        el: '[data-order-form]',
        data: {
            delivery: null,
            pay: null
        }
    });
}
