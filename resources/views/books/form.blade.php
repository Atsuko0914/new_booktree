<link href="{{ asset('css/book.css') }}" rel="stylesheet">

@csrf
  <div class="form_item">
    <label for="title">タイトル</label>
    <input type="text" name="title" id="title" required value="{{$book->title ?? old('title')}}"></input>
  </div>
  <div class="form_item">
    <label for="author">著者</label>
    <input type="text" name="author"
    id="author" required value="{{$book->author ?? old('author')}}"></input>
  </div>  
  <div class="form_item">
    <label for="purchase_date">購入日</label>
    <input type="text" name="purchase_date"
    id="purchase_date" value="{{$book->purchase_date ?? old('purchase_date')}}"></input>
  </div>
  <div class="form_item">
    <label for="price">価格</label>
    <input type="text" name="price"
    id="price" value="{{$book->price ?? old('price')}}"></input>
  </div>
  <div class="form_item">
    <label for="publication">出版社</label>
    <input type="text" name="publication"
    id="publication" value="{{$book->publication ?? old('publication')}}"></input>
  </div>
  <div class="form_item">
    <label for="issue_date">発行日</label>
    <input type="text" name="issue_date"
    id="issue_date" value="{{$book->issue_date ?? old('issue_date')}}"></input>
  </div>
  <div class="form_item">
    <label for="keyword">キーワード</label>
    <input type="text" name="keyword" id="keyword" value="{{$book->keyword ?? old('keyword')}}"></input>
  </div>
  <div class="form_item">
    <label for="summary">要約</label>
    <textarea name="summary" id="summary">{{$book->summary ?? old('summary')}}</textarea>
  </div>
  <div class="form_file">
    <label for="book_image_pass">picture</label>
    <input type="file" name="book_image_pass"></input>
  </div>



