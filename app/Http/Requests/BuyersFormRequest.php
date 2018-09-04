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
            'first_name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
            'email' => 'nullable|string|min:0|max:255',
            'phone_number' => 'nullable|numeric|string|digits:10',
            'adress' => 'nullable',
            'cnp' => 'nullable|string|numeric|digits:10',
            'identity_seria_nr' => 'nullable|string|numeric|digits:6',
            'settlement' => 'required',
            'identity_seria_type' => 'nullable',
            'identity_card_type' => 'nullable',
            'uploader' => 'required',
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