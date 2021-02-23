@extends('layouts/app')

@section('title', 'みんなの投稿')
<link href="{{ asset('css/article.css') }}" rel="stylesheet">

<!-- ここからコンテンツ -->
@section('content')
<div class="index_main">
  <p>みんなの投稿</p>
  <!-- 投稿作成ボタン -->
  <div class="article_search">
    <a href="{{ route('articles.create') }}">＋新しい投稿</a>
    <!-- 投稿の検索 -->
    <form class="keyword_search">
        <label for="search">キーワードで投稿を検索</label>
        <div class="keyword_inner">
          <input type="text" name="search" id="search" value="{{request('search')}}">
          <input type="submit" class="button" value="検索" ></input>
      </div>
    </form>
  </div>
</div>

  <div class="container">
    @foreach($articles as $article) 
      @include('articles.card')
    @endforeach
  </div>
  <div class="d-flex justify-content-center">
    {{ $articles->links('vendor.pagination.sample-pagination') }}
  </div>
    
  
@endsection