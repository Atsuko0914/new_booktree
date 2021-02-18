@extends('app')

@section('title', '記事詳細')

@section('content')
  <div class="container">
    
  <div class="card">
  <div class="card-body d-flex flex-row">
  
  @if( Auth::id() === $book->user_id )  
    <!-- dropdown -->
      <div class="ml-auto card-text">
        <div class="dropdown">
          <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route("books.edit", ['book' => $book]) }}">
              <i class="fas fa-pen mr-1"></i>本を更新する
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $book->id }}">
              <i class="fas fa-trash-alt mr-1"></i>本を削除する
            </a>
          </div>
        </div>
      </div>
      <!-- dropdown -->

      <!-- modal -->
      <div id="modal-delete-{{ $book->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="{{ route('books.destroy', ['book' => $book]) }}">
              @csrf
              @method('DELETE')
              <div class="modal-body">
                {{ $book->title }}を削除します。よろしいですか？
              </div>
              <div class="modal-footer justify-content-between">
                <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                <button type="submit" class="btn btn-danger">削除する</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- modal -->
      @endif
  </div>
  <div class="n d-flex flex-row">
    @if($book->book_image_path)
      <img class="mb-5 ard-img-top ml-3" src="/storage/image/{{$book->book_image_path }}" alt="本の画像" style="max-width: 15rem;">
    @endif
    <div class="card-body pt-0">
      <h3 class="card-title">
        {{$book->title}}
      </h3>
      <p>{{$book->author}}</p>
      <p>{{$book->purchase_date}}</p>
      <p>{{$book->price}}</p>
      <p>{{$book->publication}}</p>
      <p>{{$book->issue_date}}</p>
      <p>{{$book->keyword}}</p>
      <p>{{$book->summary}}</p>
    </div>
  <div>
</div>


    
  </div>
@endsection