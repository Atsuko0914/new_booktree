@csrf
<div class="form-group">
  <label></label>
  <textarea name="article_body" required class="form-control" rows="16" placeholder="本文">{{ $article->article_body ?? old('article_body') }}</textarea>
</div>