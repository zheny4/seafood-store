<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- The tile is being found in the '.env' file.--}}
    <title>{{config('app.name', 'silvex.php')}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

{{--
    TODO: Style
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    --}}
</head>
<body>
    <div style="background-color: #648b90">
        LOGO
    </div>
    <div style="background-color: #6db9bb">
        Menu 1
        <ul>
            <div id="app">
                @guest
                    <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                    <a id="navbarDropdown" href="#" role="button" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endguest
            </div>
            <li><a href="/">@lang('silvex.cart')</a></li>
            <li><a href="/">@lang('silvex.checkout')</a></li>
            <div>@lang('silvex.search')</div>
        </ul>
    </div>
    <div style="background-color: #82deff">
        Menu 2
        <ul>
            <li><a href="/">@lang('silvex.home')</a></li>
            @if(Auth::check() and Auth::user()->role==='admin')
                <li><a href="/products/create">@lang('silvex.products.create')</a></li>
                <li><a href="/products">@lang('silvex.products.all')</a></li>
            @endif
            <li><a href="/categoryFish">@lang('silvex.products.fish')</a></li>
            <li><a href="/categoryFishProducts">@lang('silvex.products.fish_products')</a></li>
            <li><a href="/categoryAccessories">@lang('silvex.products.accessories')</a></li>
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
