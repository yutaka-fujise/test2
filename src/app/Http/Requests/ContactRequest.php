<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.string' => '名前を文字列で入力してください',
            'name.max' => '名前を255文字以下で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => '有効なメールアドレス形式を入力してください',
            'email.max' => 'メールアドレスを255文字以下で入力してください',
            'tel.required' => '電話番号を入力してください',
            'tel.numeric' => '電話番号を数値で入力してください',
            'tel.digits_between' => '電話番号を10桁から11桁の間で入力してください',
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        // フォームリクエストの認証判定.デフォルトでは、falseになっていて、falseの場合は403エラーを返す仕様
        return true;
        // フォームリクエスト設定した後に403エラーが出たら、上記に問題がある可能性
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => ['required', 'string', 'max:255'],
            // 入力必須、文字列型、最大 255 文字
            'email' => ['required', 'string', 'email', 'max:255'],
            // 入力必須、文字列型、メール形式、最大 255 文字
            'tel' => ['required', 'numeric', 'digits_between:10,11'],
            // 入力必須、数値型、10〜11 桁の整数
        ];
    }
}
