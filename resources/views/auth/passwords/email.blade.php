@extends('layouts/app')

@section('title', 'パスワード再設定')
<link href="{{ asset('css/password.css') }}" rel="stylesheet">

@section('content')
<div class="top_password">
  <h1>パスワード再設定</h1>

  @include('error_card_list')

  @if (session('status'))
    <div class="card-text alert alert-success">
      {{ session('status') }}
    </div>
  @endif

    <form method="POST" action="{{ route('password.email') }}">
      @csrf

      <div class="form_item">
        <label for="email">登録済みのメールアドレスを入力してください</label>
        <input type="email" id="email" name="email" placeholder="Email Address" required></input>
      </div>

      <div class="button_panel">
        <input type="submit" class="button" value="メール送信"></input>
      </div>

    </form>
  </div>
@endsection