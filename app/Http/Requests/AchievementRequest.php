<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AchievementRequest extends FormRequest
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
            'study' => 'nullable|string|max:255',
            'enthusiasm' => 'nullable|string|max:255',
            'cause' => 'nullable|string|max:255',
            'solution' => 'nullable|string|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'study' => '学び・反省',
            'enthusiasm' => '次回の意気込み',
            'cause' => '失敗した原因',
            'solution' => '次回の対策',
        ];
    }
}
