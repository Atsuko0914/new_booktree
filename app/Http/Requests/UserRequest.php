<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'user_id' => 'integer|required',
            'name' => 'required|string|max:255',
            'user_image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function attributes()
    {
        return [
            'user_image_path' => 'picture',
        ];
    }
}
