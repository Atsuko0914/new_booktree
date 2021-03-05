@extends('top')

@section('login')
@section('title', 'ログイン')



@include('error_card_list')
<div class="top_login">
  <h1>BookTreeにログイン</h1>
  <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="btn btn-block btn-danger">
  <i class="fab fa-google mr-1"></i>Googleでログイン
</a>
  <form action="{{ route('login') }}" method="POST">
  @csrf

    <div class="form_item">
      <label for="email"></label>
      <input type="email" name="email" placeholder="Email Address" required value="{{old('email')}}"></input>
    </div>

    <div class="form_item">
      <label for="password"></label>
      <input type="password" name="password"
      placeholder="Password" required></input>
    </div>

    <input type="hidden" name="remember" id="remember" value="on">

    <div class="button_panel">
      <input type="submit" class="button" value="ログイン"></input>
    </div>

    <div class="form_footer">
      <p><a href="{{ route('password.request')}}">パスワードをお忘れの方</a></p>
    </div>

  </form>
</div>
  @endsection