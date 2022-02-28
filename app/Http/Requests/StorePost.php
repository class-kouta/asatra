<?php

namespace App\Http\Requests;

use App\Enums\PostStatusType;
use Illuminate\Foundation\Http\FormRequest;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Validation\Validator;

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
            'describe' => 'max:200',
            'explain' => 'max:200',
            'specify' => 'max:200',
            'choose_yes' => 'nullable|string|max:200',
            'choose_no_reply' => 'nullable|string|max:100',
            'choose_no_answer' => 'nullable|string|max:200',
            'note' => 'nullable|string|max:200',
            'status' => [ 'required', 'integer', new EnumValue(PostStatusType::class, false)],
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->sometimes (['describe','explain','specify'], 'required|string', function ($input) {
            return $input->status == PostStatusType::PUBLISHED || $input->status == PostStatusType::SECRET;
        });
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
