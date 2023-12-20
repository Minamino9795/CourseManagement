<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LessionRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'type' => 'required',
            'content' => 'required',
            'duration' => 'required',
            'course_id' => [
                'required',
                Rule::notIn(['--Vui lòng chọn--']),
            ],
            
        ];
        if ($this->old_image) {
            unset($rules['image_url']);
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên bắt buộc nhập',
            'type.required' => 'Loại bài học bắt buộc nhập',
            'content.required' => 'Nội dung bắt buộc nhập',
            'duration.required' => 'Thời gian bắt buộc nhập',
            'course_id.requied' => 'vui lòng chọn khóa học',
            'course_id.not_in' => 'Vui lòng chọn một giá trị cho khóa học.',
        ];
    }
}