@csrf
<div class="form-group">
  <label></label>
  <textarea name="article_body" required class="form-control" rows="16" placeholder="本文">{{ $article->article_body ?? old('article_body') }}</textarea>
  <div class="form_item">
    <label for="article_image_path">画像</label>
    <input type="file" name="article_image_path" id="article_image_path"></input>
  </div>
</div>