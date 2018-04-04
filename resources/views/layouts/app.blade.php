<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--TODO: Style--}}
    {{--<link rel="stylesheet" href="{{asset('css/app.css')}}">--}}

    {{-- The tile is being found in the '.env' file.--}}
    <title>{{config('app.name', 'silvex.php')}}</title>
</head>
<body>
    <div style="background-color: #648b90">
        LOGO
    </div>
    <div style="background-color: #6db9bb">
        Menu 1
        <ul>
            <li><a href="/">@lang('silvex.login')</a></li>
            <li><a href="/">@lang('silvex.register')</a></li>
            <li><a href="/">@lang('silvex.cart')</a></li>
            <li><a href="/">@lang('silvex.checkout')</a></li>
            <div>@lang('silvex.search')</div>
        </ul>
    </div>
    <div style="background-color: #82deff">
        Menu 2
        <ul>
            <li><a href="/">@lang('silvex.home')</a></li>
            <li><a href="/products/create">@lang('silvex.products.create')</a></li>
            <li><a href="/products">@lang('silvex.products.fish')</a></li>
            <li><a href="/products">@lang('silvex.products.fish_products')</a></li>
            <li><a href="/products">@lang('silvex.products.accessories')</a></li>
        </ul>
    </div>
    <div>
        <div>
            @include('inc.messages')
        </div>
        <div>
            @yield('content')
        </div>
    </div>
    <div style="background-color: #0f8ed6">
        Footer
        <a href="/about">@lang('silvex.about')</a>
    </div>
</body>
</html>
