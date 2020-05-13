<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
    {//unique:post|
        return [
            'values.title' => 'required|max:10',
            'values.content' => 'required'
        ];
    }

    /**
     * 取得已定義驗證規則的錯誤訊息。
     *
     * @return array
     */
    public function messages()
    {
        return [
            'values.title.max' => 'The title may not be greater than 10 characters.',
            'values.title.required' => 'The title field is required.',
            'values.content.required' => 'The content field is required.'
        ];
    }
}
