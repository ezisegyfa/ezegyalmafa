<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class BuyerObservationsFormRequest extends FormRequest
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
            'text' => 'required|string',
            'score' => 'required|numeric|min:-2147483648|max:2147483647',
            'type' => 'required|integer',
            'buyer' => 'required|integer',
    
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
        $data = $this->only(['text','score','type','buyer','uploader']);



        return $data;
    }

}