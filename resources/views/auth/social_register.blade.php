@extends('layouts/app')

@section('title', 'ユーザー登録')
<link href="{{ asset('css/social_register.css') }}" rel="stylesheet">

@section('content')
  <div class="google_login">
    <h1>ユーザー登録</h1>
    @include('error_card_list')
    <form method="POST" 
    action="{{ route('register.{provider}', ['provider' => $provider])}}">
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">
      <div class="form_item">
        <label for="name"></label>
        <input class="form-control" type="text" id="name" name="name" placeholder="name" required>
      </div>
      <div class="form_item">
        <label for="email"></label>
        <input class="form-control" type="text" id="email" name="email" placeholder="Email Address" value="{{ $email }}" disabled>
      </div>
      <div class="button_panel">
        <input type="submit" class="button" value="ユーザー登録"></input>
      </div>
    </form>
  </div>
@endsection