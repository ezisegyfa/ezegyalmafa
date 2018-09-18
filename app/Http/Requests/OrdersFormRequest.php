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
            'quantity' => 'required|numeric|min:-2147483648|max:2147483647',
            'buyer' => 'required',
            'product_type' => 'required',
            'uploader' => 'nullable',
            'settlement' => 'required',
            'price' => 'required|numeric|min:-2147483648|max:2147483647',
    
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
        $data = $this->only(['quantity','buyer','product_type','uploader','settlement','price']);



        return $data;
    }

}