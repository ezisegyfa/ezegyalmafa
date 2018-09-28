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
            'image' => 'required|string|min:1|max:255',
            'material_type' => 'required|integer',
            'process_type' => 'required|integer',
            'average_price' => 'required|integer'
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
        $data = $this->only(['image','material_type','process_type', 'average_price', 'description']);



        return $data;
    }

}