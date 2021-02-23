@extends('layouts/app')

@section('title', '記事更新')

@section('content')
  @include('error_card_list')
  <form method="POST" action="{{ route('books.update', ['book' => $book->id]) }}" enctype="multipart/form-data">
    @method('PATCH')
    @include('books.form')
    <button type="submit" class="same_button">更新する</button>
  </form>
@endsection