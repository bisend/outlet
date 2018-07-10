<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $model->title }}</title>
    <meta name="description" content="{{ $model->description }}">
    <meta name="keywords" content="{{ $model->keywords }}">

    <!-- fancybox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css"/>

    @if(isset($model->metaLinkPrev) && !is_null($model->metaLinkPrev))
        <link rel="prev" href="{{ $model->metaLinkPrev }}">
    @endif
    @if(isset($model->metaLinkNext) && !is_null($model->metaLinkNext))
        <link rel="next" href="{{ $model->metaLinkNext }}">
    @endif
    @if(isset($model->setNoIndex) && $model->setNoIndex)
        <meta name="robots" content="noindex, follow">
    @endif

    {{--CSS--}}
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>

@if(!Auth::check())
    @include('modals.loginModal')
    @include('modals.registrModal')
    @include('modals.restoreModal')
    @include('modals.socialEmailModal')
@endif
@include('modals.messageModal')
@include('modals.cartModal')
@include('modals.orderModal')

<div class="mobile-nav-bg"></div>

@include('partial.header')

<div class="after-header-mrg"></div>

{{--CONTENT AREA--}}
@yield('content')
{{--CONTENT AREA END--}}

{{--FOOTER BEGIN--}}
@include('partial.footer')
{{--FOOTER END--}}

@include('php-js-vars')

{{--JS--}}
<script defer src="{{ mix('/js/global.js') }}"></script>
<script defer src="{{ mix('/js/app.js') }}"></script>
<script defer src="{{ mix('/js/all.js') }}"></script>
<script defer src="{{ mix('/js/loader.js') }}"></script>
<script defer src="{{ mix('/js/review.js') }}"></script>
<script defer src="{{ mix('/js/product.js') }}"></script>
<script defer src="{{ mix('/js/similar-products.js') }}"></script>
<script defer src="{{ mix('/js/small-cart.js') }}"></script>
<script defer src="{{ mix('/js/big-cart.js') }}"></script>
<script defer src="{{ mix('/js/new-slider.js') }}"></script>
<script defer src="{{ mix('/js/sales-slider.js') }}"></script>
<script defer src="{{ mix('/js/top-slider.js') }}"></script>
<script defer src="{{ mix('/js/search.js') }}"></script>
<script defer src="{{ mix('/js/product-grid.js') }}"></script>
<script defer src="{{ mix('/js/filters.js') }}"></script>
<script defer src="{{ mix('/js/selected-filters.js') }}"></script>

<script defer src="{{ mix ('/js/jquery.matchHeight.js') }}"></script>

{{--<script defer src="{{ mix ('/js/launch.js') }}"></script>--}}



<script defer src="{{ mix('/js/wishlist.js') }}"></script>
<script defer src="{{ mix('/js/PaymentDelivery.js') }}"></script>
<script defer src="{{ mix('/js/MyOrders.js') }}"></script>
<script defer src="{{ mix('/js/PersonalInfo.js') }}"></script>
<script defer src="{{ mix('/js/ChangePassword.js') }}"></script>


@if(!Auth::check())
    <script defer src="{{ mix('/js/login.js') }}"></script>
    <script defer src="{{ mix('/js/register.js') }}"></script>
    <script defer src="{{ mix('/js/restore-password.js') }}"></script>
    <script defer src="{{ mix('/js/social-email.js') }}"></script>
    @endif


            <!-- fancybox -->
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

    <!-- <script src="/js/jquery-1.11.2.min.js"></script> -->
    <script>
        $(document).ready(function () {
            $("body").on("click", ".size-addToCart span", function (e) {
                var el = e.target,
                        $this = $(this),
                        elBlock = $(".size-addToCart");

                e.stopPropagation();
                e.preventDefault();

                if (el = elBlock) {
                    return false;
                }
            });
        });
    </script>

    @include('modals.loader')
</body>
</html>