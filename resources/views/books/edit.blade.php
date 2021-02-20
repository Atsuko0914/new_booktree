@extends('app')

@section('title', '記事更新')

@section('content')
  @include('error_card_list')
    <div>
      <form method="POST" action="{{ route('books.update', ['book' => $book->id]) }}">
        @method('PATCH')
        @include('books.form')
        <button type="submit" class="same_button">更新する</button>
      </form>
    </div>
@endsection