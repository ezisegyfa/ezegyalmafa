<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class OrdersFormRequest extends FormRequest
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
            'quantity' => 'required|numeric|integer',
            'buyer' => 'required|integer',
            'product_type' => 'required|integer',
            'settlement' => 'required|integer',
            'address' => 'required|string'
            'price' => 'required|numeric|integer',
    
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
        $data = $this->only(['quantity','buyer','product_type','uploader','settlement','address', 'price']);



        return $data;
    }

}