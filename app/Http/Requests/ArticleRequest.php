<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'article_body' => 'required|max:500',
            'article_image_path' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
        ];
    }
    public function attributes()
    {
        return [
            'article_body' => '本文',
            'book_image_path' => 'picture',
        ];
    }
}
