@extends('app')

@section('title', '記事更新')

@include('nav')

@section('content')
  @include('error_card_list')
    <div>
      <form method="POST" action="{{ route('articles.update', ['article' => $article->id]) }}">
        @method('PATCH')
        @include('articles.form')
        <button type="submit" class="same_button">更新する</button>
      </form>
    </div>
@endsection