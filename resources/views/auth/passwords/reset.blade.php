@extends('layouts/app')

@section('title', 'パスワード再設定')
<link href="{{ asset('css/password.css') }}" rel="stylesheet">

@section('content')
<div class="top_password">
  <h1>新しいパスワードを設定</h1>

  @include('error_card_list')
    <form method="POST" action="{{ route('password.update') }}">
      @csrf

      <input type="hidden" name="email" value="{{ $email }}">
      <input type="hidden" name="token" value="{{ $token }}">

      <div class="form_item">
        <label for="password">新しいパスワード</label>
        <input class="form-control" type="password" id="password" name="password" required>
      </div>

      <div class="form_item">
        <label for="password_confirmation">新しいパスワード(再入力)</label>
        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
      </div>

      <div class="button_panel">
        <input type="submit" class="button" value="送信"></input>
      </div>
    </form>
</div>
          
@endsection