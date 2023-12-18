<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
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
        // dd($this->all());
        $courseId = $this->course;
        $rules = [
            'name' => [
                'required',
                'max:255',
                
            ],
            'description' => 'required',
            'price' => 'required',
            'status' => 'required',
            'category_id' => [
                'required',
                Rule::notIn(['--Vui lòng chọn--']),
            ],
            'level_id' => [
                'required',
                Rule::notIn(['--Vui lòng chọn--']),
            ],
          

        ];
       
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống.',
           
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'description.required' => 'Mô tả không được để trống.',
            'price.required' => 'Giá không được để trống.',
            'status.required' => 'Trạng thái không được để trống.',
            'category_id.required' => 'Danh mục không được để trống.',
            'category_id.not_in' => 'Vui lòng chọn một giá trị cho Danh mục.',
            'level_id.required' => 'Cấp độ không được để trống.',
            'level_id.not_in' => 'Vui lòng chọn một giá trị cho Cấp độ.',
          
        ];
    }
}
