<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeliveryEmailUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // 認証は別途行われているため、ここでは true に設定
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'delivery_email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user()->id)],
        ];
    }

    /**
     * 定義済みバリデーションルールのエラーメッセージ取得
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'delivery_email.required' => '配信先メールアドレスは必ず指定してください。',
            'delivery_email.email' => '配信先メールアドレスには、有効なメールアドレスを指定してください。',
            'delivery_email.max' => '配信先メールアドレスには、255文字以下の文字列を指定してください。',
            'delivery_email.unique' => '入力された配信先メールアドレスはすでに使用されています。',
        ];
    }
}