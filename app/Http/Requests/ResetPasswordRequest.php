<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            "password" => "required|min:6|confirmed",
            "password_confirmation" => "required",
        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'Vui lòng nhập mật khẩu mới',
            'password.confirmed' => 'Mật khẩu xác nhận không trùng khớp',
            'password.min' => 'Mật khẩu không được dưới 6 ký tự',
            'password_confirmation.required' => 'Vui lòng xác nhận mật khẩu',
            'password_confirmation.confirmed' => 'Mật khẩu xác nhận không giống với mật khẩu mới',
        ];
    }
}
