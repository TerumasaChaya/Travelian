<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserTravelPostRequest extends Request
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
            'name' => 'required|max:100',
            'comment' => 'required|max:255',
        ];
    }

    public function messages() {
        return [
            'name.required' => '旅名は空白ではいけません！',
            'name.max' => '旅名は最大255文字以内にしないといけません！',
            'comment.required' => 'コメントは空白ではいけません！',
            'comment.max' => 'コメントは最大255文字以内にしないといけません!',
        ];
    }

}
