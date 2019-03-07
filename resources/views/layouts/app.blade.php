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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-slider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

    <script src="https://use.fontawesome.com/874dbadbd7.js"></script>

</head>
<body>
    <div id="app">
        <nav id="nav" class="navbar navbar-default navbar-full nav-bg">
            <div class="container-fluid">
                <div class="container container-nav">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="navbar-header">
                                <button aria-expanded="false" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="logo-holder" href="{{ url('/') }}">
                                    <div class="logo" style="height:18px">{{ config('app.name', 'Laravel') }}</div>
                                </a>
                            </div>

                            <div style="height: 1px;" role="main" aria-expanded="false" class="navbar-collapse collapse" id="bs">
                                <ul class="nav navbar-nav navbar-right">
                                    <!-- Authentication Links -->
                                    <li><a href="{{ route('companies.index') }}"><i class="fa fa-building" aria-hidden="true"></i> Companies</a></li>
                                    <li><a href="{{ route('projects.index') }}"><i class="fa fa-briefcase" aria-hidden="true"></i> Projects</a></li>
                                    <li><a href="{{ route('tasks.index') }}"><i class="fa fa-tasks" aria-hidden="true"></i> Tasks</a></li>
                                    @guest
                                        <li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
                                        <li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a></li>
                                    @else
                                        @if(Auth::user()->role_id == 1)
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                                    Admin<span class="caret"></span>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a href="{{route('companies.index')}}">All Companies</a></li>
                                                    <li><a href="{{route('projects.index')}}">All Projects</a></li>
                                                    <li><a href="{{route('tasks.index')}}">All Tasks</a></li>
                                                </ul>
                                            </li>
                                        @endif
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>

                                            <ul class="dropdown-menu">
                                                <li><a href="{{route('home')}}">Dashboard</a></li>
                                                <li><a href="{{route('companies.index',['id'=>'1'])}}">My Companies</a></li>
                                                <li><a href="{{route('projects.index',['id'=>'1'])}}">My Projects</a></li>
                                                <li><a href="{{route('tasks.index',['id'=>'1'])}}">My Tasks</a></li>
                                                <li>
                                                    <a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        Logout
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
                    </div>
                </div>
            </div>
        </nav>
        <div class="container bottom-buffer top-buffer">

            @include('partials.errors')
            @include('partials.success')

            <div class="row">

                @yield('content')

            </div>
        </div>

        <div id="footer" class="container-fluid">
            <div class="container">
                <div class="row">

                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="address-holder">
                            <div class="phone"><i class="fas fa-phone"></i> 00 285 900 38502</div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="address-holder">
                            <div class="email"><i class="fas fa-envelope"></i> enquiry@projecthub.com</div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="address-holder">
                            <div class="address">
                                <i class="fas fa-map-marker"></i>
                                <div>City Avenue, Office 64,<br>
                                    Floor 6,  Milbourne,<br>
                                    Australia.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
