<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'purchase_date',
        'price',
        'publication',
        'issue_date',
        'keyword',
        'summary',
        'book_image_path',
    ];
    
    public function user(): BelongsTO 
    {
        return $this->belongsTO('App\User');
    }
}
