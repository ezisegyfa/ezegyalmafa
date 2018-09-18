<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class BuyersFormRequest extends FormRequest
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
            'first_name' => 'nullable|string|min:0|max:255',
            'last_name' => 'nullable|string|min:0|max:255',
            'email' => 'nullable|string|min:0|max:255',
            'phone_number' => 'nullable|numeric|string|min:0|max:10',
            'adress' => 'nullable',
            'cnp' => 'nullable|string|min:0|max:13',
            'identity_seria_nr' => 'nullable|string|min:0|max:6',
            'settlement' => 'nullable',
            'identity_seria_type' => 'nullable',
            'identity_card_type' => 'nullable',
            'uploader' => 'nullable',
            'notification_type' => 'nullable',
    
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
        $data = $this->only(['first_name','last_name','email','phone_number','adress','cnp','identity_seria_nr','settlement','identity_seria_type','identity_card_type','uploader','notification_type']);



        return $data;
    }

}