<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLevelRequest extends FormRequest
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
            'name'=> 'required|unique:levels',
            'level'=>'required',
            'status'=>'required',

        ];
    }

    public function messages()
    {
        return [
            'name.unique'=> 'Tên khóa học này đã có',
            'name.required'=> 'Tên khóa học không được để trống',
            'level.required'=> 'Cấp độ không được để trống',
            'status.required'=> 'Vui lòng chọn trạng thái',
        ];
    }
}
