<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable = [
        'article_body',
        'article_image_pasth',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

}
