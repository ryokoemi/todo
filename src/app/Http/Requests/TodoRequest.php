<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            'content' => ['required', 'string', 'max:20'],
            //以下に最後にカテゴリidのバリデーションを追加。（テキスト内にはなかったけど、最終ページのコード確認にあり）
            'category_id' => ['required']
        ];
    }

    public function messages()
    {
        return[
            'content.required' => 'ToDoを入力してください',
            'content.string' => 'ToDoを文字列で入力してください',
            'content.max' => 'ToDoを20文字以下で入力してください',
            'category_id.required' => 'カテゴリを入力してください'
        ];
    }
}
