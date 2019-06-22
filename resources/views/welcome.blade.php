<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts&Bootstprap -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .title {
                font-size: 25px;
            }

            /* 検索セクション*/
            #search{
                background-image: url({{asset('storage/tetwe.png')}});
                background-size:cover;
                height:500px;  
                text-align:center;
                color:white;
            }

            #search > .container{
                padding-top: 150px;_
            }



            /* 写真のホバー時の動き　*/
            .ph-style-base{
                background-color: black;    
                display: block;
                position: relative;
                height: 200px;
                width: 300px;
            }

            .mask{
                opacity: 0;
                position: absolute;
            　  top:0;
                color: white;
                margin: auto;   
                width: 300px;
            }

            .ph-style:hover{
                opacity:0.5;
            }

            .ph-style-base:hover .mask{
                opacity: 1;
            }

            /*photo*/
            #top-photo{
                text-align: center;
            }

            /*about*/
            #about{
                margin-top: 100px;
            }

            footer{
                background-color: #33383c;
                padding:30px 0px;
            }          

            .logo{
                color:#FFF;
                font-weight:700;
                font-size:30px;
            }

            .address span , .menu span{
               color: #FFF; 
               font-weight: bold; 
               border-bottom: 1px solid #c7c7c7; 
               padding:10px 0px;
               display: block;
               text-transform: uppercase;
               font-size: 16px;
               letter-spacing: 3px;
            }
             
            .address li a , .menu li a{
                color:#FFF;
                letter-spacing: 3px;
                text-decoration:none;
                font-size:14px;
            }

            .address li, .menu li{
                margin:20px 0px;
                list-style: none;
            }

            .address li a:hover , .menu li a:hover{
                color: #da3e44;
                -webkit-transition: all 1s ease-in-out;
                -moz-transition: all 1s ease-in-out;
                -o-transition: all 1s ease-in-out;
                transition: all 1s ease-in-out;
            }

            .address .fa{
                color: #da3e44;
                margin-right: 10px;
                font-size:18px;
            }

        </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-md  navbar-light p-4" style="background-color: white;">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#bs-navi" aria-controls="bs-navi" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
             </button>
  
            <div class="collapse navbar-collapse" id="bs-navi">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item title"><a class="nav-link" href="/">PhotoBase</a></li>
                </ul>
                @if (Route::has('login'))
                <ul class="navbar-nav">
                     @auth
                    <li class="nav-item mx-15"><a class="nav-link" href="{{ url('/posts') }}">写真</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">HOME</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link" href="{{ url('/posts') }}">写真</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">ログイン</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">登録</a></li>
                    @endauth
                </ul>
                @endif
            </div>
        </nav>

        <div id="search">
            <div class="container">
                <h2>美しいフリー写真をみていこう</h2>
                <form method="post" action="{{ url('/posts' )}}">
                    <div class="form-group form-inline">
                        <input class="search-text form-control col-md-7 offset-md-2" type="text" placeholder="キーワード(例：人)" name="keyword">
                        <input class="search-button form-control col-md-1" type="submit" name="submit" value="検索">
                    </div>
                </form>
                </div>
                <p>Let'share photos</p>
                <p>写真を共有しましょう</p>
            </div>
        </div>

        <div id="top-photo">
            <div class="container">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="mx-auto" style="margin-top:20px">
                            <a class="ph-style-base" href="{{ url('posts/'.$post->id)}}">
                            <img class="ph-style img-flud" src="{{ asset('storage/' . $post->file_name) }}" width="300px" height="200px">
                            <p class="mask"> 
                            {{$post->likes->count()}}
                            </p>
                            </a>
                        </div>
                    @endforeach
                </div>
                
                <button type="button" class="btn btn-success mb-5 mt-5" onclick="moreLook()">もっと写真を見る</button>
                <input type="hidden" class="photo-param" value="1">
            </div>
        </div>

        <div id="top-signup">
            <div class="container mt-5">
                <div class="row mb-4">
                    <div class="mx-auto">
                        <h2>PhotoBaseに登録する</h2>
                    </div>  
                </div>
                <div class="row mb-4 mx-2">
                        <p class="mx-auto" >登録して色々な人共有しましょう。コメントやお気に入り登録もできるようになります。</p>
                </div>
                <div class="row mb-5">
                    <a  class="mx-auto m" href="{{ route('register') }}"><button class="btn btn-success" href="po">サインアップする！</button></a>
                </div>
            </div>
        </div>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <span class="logo">PhotoBase</span>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
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
                   
                    <div class="col-md-4 col-sm-6 col-xs-12">
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

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="{{ asset('/js/post.js') }}"></script>
    </body>
</html>
