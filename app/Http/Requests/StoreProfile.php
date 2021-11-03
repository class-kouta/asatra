<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfile extends FormRequest
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
            'name' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
            'sex' => 'required',
            'age' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '入力必須です',
            'name.max' => '20文字以内で入力してください',
            'email.required' => '入力必須です',
            'email.email' => 'メールアドレスを形式で入力してください',
            'email.max' => '255文字以内で入力してください',
            'sex.required' => '選択してください',
            'age.required' => '選択してください',
        ];
    }
}
