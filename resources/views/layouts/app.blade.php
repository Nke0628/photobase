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
    <link href="{{ asset('css/select2.min.css') }}"  rel="stylesheet" />


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Photobase
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('登録') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    写真を探す
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/posts')}}">
                                       一覧
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/trend')}}">
                                       トレンド
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{ asset('storage/icon/'. Auth::user()->user_image)}}" style="width:30px; height:30px;  border-radius:30px;">
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ url('/home')}}">
                                       マイページ
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/mypage')}}">
                                       設定
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="mb-5">
            @yield('content')
        </main>

    
    </div>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <span class="logo">PhotoBase</span>
                    </div>
                    <div class="col-md-4 col-12">
                        <ul class="menu">
                            <span>Menu</span>    
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">About</a>
                            </li>           
                            <li>
                                <a href="#">Blog</a>
                            </li>          
                            <li>
                                <a href="#">Gallery </a>
                            </li>
                        </ul>
                    </div>
                   
                    <div class="col-md-4 col-12">
                        <ul class="address">
                            <span>Contact</span>       
                            <li>
                                <i class="fa fa-phone" aria-hidden="true"></i> <a href="#">Phone</a>
                            </li>
                            <li>
                                <i class="fa fa-map-marker" aria-hidden="true"></i> <a href="#">Adress</a>
                            </li> 
                            <li>
                                <i class="fa fa-envelope" aria-hidden="true"></i> <a href="#">Email</a>
                            </li> 
                        </ul>
                    </div>
                 </div> 
            </div>
        </footer>
    <!--js、jQuery、select2読み込み-->
    <--!<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/select2.min.js') }}" defer></script>
    <script src="{{ asset('/js/post.js') }}"></script>

</body>
</html>
