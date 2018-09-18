<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ProductTypesFormRequest extends FormRequest
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
        $rules = [
            'image' => 'required|numeric|string|min:1|max:255',
            'material_type' => 'required',
            'process_type' => 'required',
    
        ];

        return $rules;
    }
    
    /**
     * Get the request's data from the request.
     *
     * 
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['image','material_type','process_type']);



        return $data;
    }

}