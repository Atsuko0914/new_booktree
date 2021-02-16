@extends('app')

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
  <div class="new_book">
    <form action="">
      <label for="my_serch">My検索</label>
      <select name="select_box">
        <option value="タイトル">タイトル</option>
        <option value="著者">著者</option>
        <option value="キーワード">キーワード</option>
      </select>
        <input type="text" name="my_serch" id="my_serch">
        <input type="submit" class="button" value="検索" ></input>
    </form>
  </div>
  </div>

  <div class="container">
    @foreach($books as $book) 
      @include('books.card')
    @endforeach
  </div>









@endsection
