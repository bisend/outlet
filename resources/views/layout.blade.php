<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Outlet Shoes</title>


    {{--CSS--}}
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">



</head>
<body>

<div class="mobile-nav-bg"></div>

@include('partial.header')

<div class="after-header-mrg"></div>

{{--CONTENT AREA--}}
@yield('content')
{{--CONTENT AREA END--}}


@include('php-js-vars')


{{--JS--}}
<script defer src="{{ mix('/js/app.js') }}"></script>


</body>
</html>