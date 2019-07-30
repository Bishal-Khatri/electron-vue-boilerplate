<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .btn{
            border-radius: 0px;
        }
        .shadow-sm {
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075) !important;
        }
        .bg-primary {
            background-color: #1D3233 !important;
            color: white;
        }
        .bg-secondary {
            background-color: #11646F !important;
            color: white;
        }
        .card-header{
            border-radius: 0px !important;
        }
        .card-body{
            border-radius: 0px !important;
        }
        .modal-content{
            border-radius: 0px;
            background-color: #f5f4f0;
        }
        .navbar-dark .navbar-nav .active > .nav-link, .navbar-dark .navbar-nav .nav-link.active, .navbar-dark .navbar-nav .nav-link.show, .navbar-dark .navbar-nav .show > .nav-link {
            color: #1497a3 !important;
        }
        .nav-link{
            color: white !important;
            font-size: 15px;
        }
        .nav-link:hover {
            color: #1497a3 !important;
        }
        .nav-link:active, .nav-link:focus, .navbar-brand:active, .navbar-brand:focus {
            outline: 0;
            border: none;
            -moz-outline-style: none;
        }
        input, textarea {
            background-color : #f7f6f2 !important;
        }
        .card-body {
            flex: 1 1 auto;
            padding: 1.25rem;
            background-color: #f5f4f0;
        }
        .vl {
            border-left: 1px solid #11646F;
            height: 15px;
            margin-top: 12px;
            padding-left: 10px;
            margin-left: 10px;
            box-shadow: inset 1px 0 0 #000;
        }
    </style>
</head>
<body style="background-color: #F0F0EC;">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                @if (Auth::check())
                    <ul class="navbar-nav ml-5">
                        <li class="nav-item">
                            <a class="nav-link @if(Request::is(ADMIN_URL.'home')) active @endif" href="{{ route('home') }}" >{{ __('Dashboard') }}</a>
                        </li>
                        <span class="vl"></span>
                        <li class="nav-item">
                            <a class="nav-link @if(Request::is(ADMIN_URL.'link')) active @endif" href="{{ route('link.index') }}" >{{ __('Links') }}</a>
                        </li>
                        <span class="vl"></span>
                        <li class="nav-item">
                            <a class="nav-link @if(Request::is(ADMIN_URL.'social_user')) active @endif" href="{{ route('social_user.index') }}" >{{ __('Social User') }}</a>
                        </li>
                        <span class="vl"></span>
                        <li class="nav-item">
                            <a class="nav-link" href="" >{{ __('Bonus') }}</a>
                        </li>
                        <span class="vl"></span>
                        <li class="nav-item">
                            <a class="nav-link" href="" >{{ __('Application Users') }}</a>
                        </li>
                    </ul>
            @endif

            <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                        {{--</li>--}}
                        {{--@if (Route::has('register'))--}}
                        {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                        {{--</li>--}}
                        {{--@endif--}}
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="">
                                    {{ __('Profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
