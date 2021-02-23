<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|max:50',
            'author' => 'required|max:50',
            'purchase_date' => 'nullable|date',
            'price' => 'nullable|integer',
            'publication' => 'nullable|max:50',
            'issue_date' => 'nullable|date',
            'keyword' => 'nullable|max:50',
            'summary' => 'nullable|max:500',
            'book_image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'author' => '著者',
            'purchase_date' => '購入日',
            'price' => '価格',
            'publication' => '出版社',
            'issue_date' => '発行日',
            'keyword' => 'キーワード',
            'summary' => '要約',
            'book_image_path' => 'picture',
        ];
    }
}
