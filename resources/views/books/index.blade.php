@extends('layouts/app')

@section('title', 'Mylibrary')
<link href="{{ asset('css/book.css') }}" rel="stylesheet">



<!-- ここからコンテンツ -->
@section('content')
<div class="mylibrary_wrap">
  <div class="mylibrary_main">
    <p class="my_library">MyLibrary</p>
    <!-- 新しい本ボタン -->
    <a href="{{route('books.create')}}">＋新しい本</a>
  </div>
  <!-- My検索 -->
    <form class="my_search">
      <div class="my_search_wrap">
        <label for="my_search">My検索</label>
        <select name="select_box">
          <option value="タイトル">タイトル</option>
          <option value="著者">著者</option>
          <option value="キーワード">キーワード</option>
        </select>
      </div>
      <div class="my_search_inner">
        <input type="text" name="my_search" id="my_search">
        <input type="submit" class="my_button" value="検索" ></input>
      </div>
    </form>
</div>

  
  <div class="container card-columns">
    @foreach($books as $book) 
      @include('books.card')
    @endforeach
  </div>
  <div class="d-flex justify-content-center">
    {{ $books->links('vendor.pagination.sample-pagination') }}
  </div>
  
  










@endsection
