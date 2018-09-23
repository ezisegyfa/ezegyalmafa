<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StockTransportsFormRequest extends FormRequest
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
            'quantity' => 'required|integer',
            'product_type' => 'required|integer',
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
        $data = $this->only(['quantity','product_type','average_price','uploader']);



        return $data;
    }

}