<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'article_id' => 'required|integer',
            'comment' => 'required|string|max:1000',
        ];
    }

    public function attributes()
    {
        return [
            'user_id' => 'ユーザーID',
            'article_id' => '記事ID',
            'comment' => 'コメント',
        ];
    }
}
