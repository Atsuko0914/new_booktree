<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Bootstrap core CSS -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
  <!-- css -->
  <link rel="stylesheet" href="{{ asset('css/html5reset-1.6.1.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/top.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}"></script>

  <title>@yield('title')</title>
</head>
<body>
  <header>
<!-- サイトロゴ -->
    <a href="{{url('/')}}">BookTree</a> 
<!-- ナビゲーション -->
      <nav>
        <a href="{{ route('register')}}">新規登録</a>
        <a href="">ゲストログイン</a>
      </nav>
  </header>
  <div id="home" class="main_img">
    <div class="top_message">
      <p>読者家のためのコミュニティーサイト<span>"BookTree"</span></p>
      <p>あなただけの<span>MyLibrary</span>を利用して</p>
      <p>よりよい<span>読書LIFEを。。。</span></p>
    </div>
    @yield('login')
  </div>
  <footer>
    <p><small>Powerd by Atsuko Tanaka</small></p>
  </footer>  
</body>
</html>