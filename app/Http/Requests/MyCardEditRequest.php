<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MyCardEditRequest extends FormRequest
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
            'fullname'    => 'required',
            'job_title' => 'required|max:30',
            'department' => 'required|max:30',
            'company_name' =>'required|max:30',
            'company_address' => 'required|max:30',
            'bio' => 'required|max:140',
            'card_no' => 'required',
        ];
    }

     public function messages(): array
    {
        return [
            'department.max' => 'Department must not exceed 30 characters.',
            'job_ttile.max' => 'Job title must not exceed 30 characters.',
            'company_name.max' => 'Company name must not exceed 30 characters.',
            'company_address.max' => 'Company address must not exceed 30 characters.',
            'bio.max' => 'Bio must not exceed 140 characters.',
        ];
    }
}
