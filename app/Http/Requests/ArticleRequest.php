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
            'title' => 'required|max:255',
            'tags' => 'json|regex:/^(?!.*\s).+$/u|regex:/^(?!.*\/).*$/u',
            'period' => 'required|date',
            'body' => 'required|max:255',
            'study' => 'max:1000',
            'enthusiasm' => 'max:1000',
            'cause' => 'max:1000',
            'solution' => 'max:1000',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'tags' => 'タグ',
            'period' => '日付と時刻',
            'body' => '本文',
            'study' => '学び・反省',
            'enthusiasm' => '次回の意気込み',
            'cause' => '原因',
            'solution' => '次回の対策',
        ];
    }

    public function passedValidation()
    {
        $this->tags = collect(json_decode($this->tags))
            ->slice(0, 5)
            ->map(function ($requestTag) {
                return $requestTag->text;
            });
    }
}
