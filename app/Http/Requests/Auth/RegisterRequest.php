<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

class RegisterRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:users,name'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'between:8,16', 'alpha_num'],
            'password_conf' => ['required', 'same:password']
        ];
    }

    /**
     * messages
     *
     * @return void
     */
    public function messages()
    {
        return [
            'name.required' => 'ユーザーネームは必須です。',
            'name.unique' => 'そのユーザーネームはすでに使われています。',
            'email.required' => 'メールアドレスは必須です。',
            'email.email' => '正しい形式で入力してください。',
            'email.unique' => 'そのメールアドレスはすでに使われています。',
            'password.required' => 'パスワードは必須です。',
            'password.between' => 'パスワードは8文字以上,16文字以内で入力してください。',
            'password.alpha_num' => '一部使用できない文字が使われています。',
            'password_conf.required' => 'パスワード(確認用)は必須です。',
            'password_conf.same' => 'パスワードが一致しません。'
        ];
    }
}
