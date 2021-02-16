@extends('app')

@section('title', '本の登録')
<link href="{{ asset('css/book.css') }}" rel="stylesheet">


<!-- ここからコンテンツ -->
@section('content')
<!-- 写真 -->
<div class="eye_catch">
  <img src="../images/my_library.JPG" alt="本棚の写真">
</div>
<!-- 登録内容 -->
@include('error_card_list')
<form action="{{ route('books.store')}}" method="POST" enctype="multipart/form-data">
  @include('books.form')
  <div class="button_panel">
    <input type="submit" class="button" value="確認"></input>
  </div>
</form>

@endsection
