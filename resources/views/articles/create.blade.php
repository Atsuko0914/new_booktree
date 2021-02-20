@extends('app')

@section('title', '記事投稿')

@section('content')
@include('error_card_list')
  <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
    @include('articles.form')
    <button type="submit" class="same_button">投稿する</button>
  </form>
@endsection