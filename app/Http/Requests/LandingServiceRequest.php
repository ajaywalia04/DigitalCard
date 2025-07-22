<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LandingServiceRequest extends FormRequest
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
            'heading'    => 'required|max:30',
            'sub_heading'    => 'required|max:150',
            'icon' => 'required',
        ];
    }
}
