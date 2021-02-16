<form action="/book/confirm" method="POST" enctype="multipart/form-data" name="recive">
@csrf
<h1>確認画面</h1>
<p>タイトル</p>
<p>{{ Session::get('title') }}</p>
<p>著者</p>
<p>{{ Session::get('author') }}</p>
<p>購入日</p>
<p>{{ Session::get('purchase_date') }}</p>
<p>価格</p>
<p>{{ Session::get('price') }}</p>
<p>出版社</p>
<p>{{ Session::get('publication') }}</p>
<p>発行日</p>
<p>{{ Session::get('issue_date') }}</p>
<p>キーワード</p>
<p>{{ Session::get('keyword') }}</p>
<p>タイトル</p>
<p>{{ Session::get('summary') }}</p>
<p>picture</p>
<p>{{ Session::get('book_image_pass') }}</p>
<button type="submit" id="button">新しい本を登録</button>
</form>