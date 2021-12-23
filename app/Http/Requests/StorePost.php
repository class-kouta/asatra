<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
            'title' => 'required|string|max:50',
            'describe' => 'required|string|max:200',
            'explain' => 'required|string|max:200',
            'specify' => 'required|string|max:200',
            'choose_yes' => 'nullable|string|max:200',
            'choose_no_reply' => 'nullable|string|max:100',
            'choose_no_answer' => 'nullable|string|max:200',
            'note' => 'nullable|string|max:200',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '入力必須です',
            'title.max' => '50文字以内で入力してください',
            'describe.required' => '入力必須です',
            'describe.max' => '200文字以内で入力してください',
            'explain.required' => '入力必須です',
            'explain.max' => '200文字以内で入力してください',
            'specify.required' => '入力必須です',
            'specify.max' => '200文字以内で入力してください',
            'choose_yes.max' => '200文字以内で入力してください',
            'choose_no_reply.max' => '100文字以内で入力してください',
            'choose_no_answer.max' => '200文字以内で入力してください',
            'note.max' => '200文字以内で入力してください',
        ];
    }
}
