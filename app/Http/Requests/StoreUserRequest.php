<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'image' => 'required',
            'group_id' => [
                'required',
                Rule::notIn(['--Vui lòng chọn--']),
            ],
            'status' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Bạn không được để trống !',
            'email.required' => 'Bạn không được để trống !',
            'password.required' => 'Bạn không được để trống !',
            'address.required' => 'Bạn không được để trống !',
            'phone.required' => 'Bạn không được để trống !',
            'gender.required' => 'Bạn không được để trống !',
            'birthday.required' => 'Bạn không được để trống !',
            'image.required' => 'Bạn không được để trống !',
            'group_id.required' => 'chức vụ không được để trống.',
            'group_id.not_in' => 'Vui lòng chọn một chức vụ.',
            'status.required' => 'Bạn không được để trống !',
            'email.unique' => 'Tên email đã tồn tại !',
            'phone.unique' => 'Số điện thoại đã tồn tại !',
        ];
    }
}
