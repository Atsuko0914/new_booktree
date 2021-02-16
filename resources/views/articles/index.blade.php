@extends('app')

@section('title', 'みんなの投稿')
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
<link href="{{ asset('css/modal.css') }}" rel="stylesheet">

<!-- ここからコンテンツ -->
@section('content')
<div class="index_main">
  <p>みんなの投稿</p>
  <!-- 投稿作成ボタン -->
  <div class="post_serch">
    <a class="js-modal-open"  href="{{ route('articles.create') }}">＋新しい投稿</a>
    <!-- 投稿の検索 -->
    <form class="keyword_serch">
        <label for="search">キーワードで投稿を検索</label>
        <input type="text" name="search" id="search" value="{{request('search')}}">
        <input type="submit" class="button" value="検索" ></input>
    </form>
  </div>
</div>


@include('nav')
  <div class="container">
    @foreach($articles as $article) 
      @include('articles.card')
    @endforeach
  </div>
@endsection