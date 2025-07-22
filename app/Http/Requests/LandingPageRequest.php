<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LandingPageRequest extends FormRequest
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
            'main_heading' => 'required|max:60',
            'sub_heading' =>'required|max:120',
            'about_us'=> 'required|max:1000',
            'service_heading'=> 'required|max:70',
            'contact_sub_heading'=>'required|max:100',
            'color_no' => 'required'
        ];
    }
}
