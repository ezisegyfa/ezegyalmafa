<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class BuyerNotificationsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'text' => 'required',
            'score' => 'required|string|min:1',
            'type' => 'required',
            'buyer' => 'required',
    
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
        $data = $this->only(['text','score','type','buyer']);



        return $data;
    }

}