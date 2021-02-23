@csrf
<div class="article_form">
  <textarea class="article_textarea" name="article_body" required class="form-control" rows="16" placeholder="本文">{{ $article->article_body ?? old('article_body') }}</textarea>
  <div class="form_item">
    <label for="article_image_path">picture</label>
    <input type="file" name="article_image_path" id="article_image_path"></input>
  </div>
</div>