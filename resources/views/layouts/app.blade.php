<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>
  @yield('title')
  </title>
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
  <!-- css -->
  <link rel="stylesheet" href="{{ asset('css/html5reset-1.6.1.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/layouts.css') }}" rel="stylesheet">
  <link href="{{ asset('css/user.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<header>
  <!-- サイトロゴ -->
  <a href="{{route('articles.index')}}">BookTree</a>  
    <nav class="main_nav">
      <a href="{{route('articles.index')}}">みんなの投稿</a>
      <a href="{{route('books.index')}}">Mylibrary</a>
    </nav>

  <!-- dropdown -->
<div class="ml-auto card-text">
  <div class="dropdown">
    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    @if(Auth::check())
      <span class="welcome_name">ようこそ, {{ Auth::user()->name }}さん</span>
    @endif
    <div class="dropdown-menu dropdown-menu-right">
      <a class="dropdown-item" href="{{ route('user.index') }}">
        マイページ
      </a>
    </div>
  </div>
</div>

    <!-- dropdown -->

    <form id="logout-button" method="POST" action="{{ route('logout') }}">
      @csrf
      <button form="logout-button" type="submit">
        ログアウト
      </button>
    </form>
  
     
    <!-- <form id="logout-button" method="POST" action="{{ route('logout') }}">
      @csrf
    <button form="logout-button" type="submit">
      ログアウト
</button>
    </form> -->
    
  </header>

  <div id="app">
    @yield('content')
  </div>

  <footer>
    <p><small>Powerd by Atsuko Tanaka</small></p>
  </footer>  

  <script src="{{ mix('js/app.js') }}"></script>
  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>
</body>
</html>