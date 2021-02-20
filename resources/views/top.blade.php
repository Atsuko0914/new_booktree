<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!-- <div class="top_login">
      <h1>BookTreeにログイン</h1>
      <form>
        <div class="form_item">
          <label for="email"></label>
          <input type="email" name="email" placeholder="Email Address"></input>
        </div>
        <div class="form_item">
          <label for="password"></label>
          <input type="password" name="password"
          placeholder="Password"></input>
        </div>
        <div class="button_panel">
          <input type="submit" class="button" value="ログイン"></input>
        </div>
      </form>
        <div class="form_footer">
          <p><a href="#">パスワードをお忘れの方</a></p>
        </div>
    </div> -->
      
    
  </div>


  <footer>
    <p><small>Powerd by Atsuko Tanaka</small></p>
  </footer>  


  


</body>
</html>