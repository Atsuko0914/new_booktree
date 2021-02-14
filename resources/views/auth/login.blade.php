@extends('top')

@section('login')

@include('error_card_list')
<div class="top_login">
      <h1>BookTreeにログイン</h1>
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
          <p><a href="#">パスワードをお忘れの方</a></p>
        </div>

      </form>

        
    </div>
  @endsection