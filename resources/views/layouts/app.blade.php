<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <script src="https://use.fontawesome.com/e995c0a4f8.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if (auth()->check()) {{-- There is an authencated user. --}}
                            <li>
                                <a href="">
                                    <span class="fa fa-users" aria-hidden="true"></span> Gebruikers
                                </a>
                            </li>
                        @endif

                        <li>
                            <a href="">
                                <span class="fa fa-list" aria-hidden="true"></span> Namenlijst
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('news.index') }}">
                                <span class="fa fa-newspaper-o" aria-hidden="true"></span> Nieuws
                            </a>
                        </li>

                        <li>
                            <a href="">
                                <span class="fa fa-envelope" aria-hidden="true"></span> Contact
                            </a>
                        </li>

                        <li>
                            <a href="">
                                <span class="fa fa-legal" aria-hidden="true"></span> Disclaimer
                            </a>
                        </li>
                    </ul>

                    {{-- Right Side Of Navbar --}}
                    <ul class="nav navbar-nav navbar-right">
                        {{-- Authentication Links & language --}}
                        @guest {{-- User is not authenticated.  --}}
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    Taal: {{ strtoupper(config('app.locale')) }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="?lang=nl"><span class="flag-icon flag-icon-nl"></span> Nederlands</a></li>
                                    <li><a href="?lang=en"><span class="flag-icon flag-icon-us"></span> Engels</a></li>
                                    <li><a href="?lang=fr"><span class="flag-icon flag-icon-fr"></span> Frans</a></li>
                                </ul>
                            </li>

                            <li><a href="{{ route('login') }}"><span class="fa fa-sign-in" aria-hidden="true"></span> Login</a></li>
                            <li><a href="{{ route('register') }}"><span class="fa fa-plus" aria-hidden="true"></span> Register</a></li>
                        @else {{-- User is authenticated. .  --}}
                            <li>
                                {{-- TODO: Implemen the badge for displaying how much notifications are unread.  --}}

                                <a href="{{ route('notifications') }}">
                                    <span class="fa fa-bell"></span>
                                </a>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('account.settings') }}">
                                            <span class="fa fa-cogs" aria-hidden="true"></span> Instellingen
                                        </a>
                                    </li>

                                    <li>
                                        <a href="">
                                            <span class="fa fa-question"></span> Helpdesk
                                        </a>
                                    </li>

                                    <li class="divider"></li>

                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <span class="fa fa-sign-out" aria-hidden="true"></span> Afmelden
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    {{-- Scripts --}}
    <script>$('div.alert').not('.alert-important').delay(3000).fadeOut(350);</script> {{-- TODO: Set to asset JS file. --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
