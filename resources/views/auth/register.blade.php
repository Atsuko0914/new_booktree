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
  <link href="{{ asset('css/register.css') }}" rel="stylesheet">
  <script src="{{ asset('js/validation.js') }}"></script>
  <title>新規登録</title>
</head>
<body>
<!-- サイトロゴ -->
<header>
    <a href="{{url('/')}}">BookTree</a>  
</header>
<!-- ホーム画像 -->
  <div id="home">
<!-- 新規登録 -->
    <div class="new_login">
      <h1>新規登録</h1>

      @include('error_card_list')

      <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" name="validation">
      @csrf
        <div class="form_item">
          <label for="name"></label>
          <input type="text" name="name" placeholder="name" required value="{{old('name')}}"></input>
        </div>

        <div class="form_item">
          <label for="email"></label>
          <input type="email" name="email" placeholder="Email Address" required value="{{old('email')}}"></input>
          <p>{{session('error')}}</p>
        </div>

        <div class="form_item">
          <label for="password"></label>
          <input type="password" name="password" id="password"
          placeholder="Password" required></input>
        </div>
       
        <div class="form_item">
          <label for="password_confirmation"></label>
          <input type="password" name="password_confirmation"
          placeholder="Password(確認)"
          oninput="CheckPassword(this)" required></input>
        </div>

        <div class="form_file">
          <label for="user_image_path">picture</label>
          <input type="file" name="user_image_path" id="user_image_path" onchange="CheckImage"></input>
        </div>
        
        <div class="button_panel">
          <input type="submit" class="button" value="新規登録"></input>
        </div>
      </form>
    </div>
  </div>
  <footer>
      <p><small>Powerd by Atsuko Tanaka</small></p>
  </footer>
  
  
