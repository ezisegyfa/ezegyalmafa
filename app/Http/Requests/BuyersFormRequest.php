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
            'phone_number' => 'required|numeric|string|min:1|max:15',
            'adress' => 'required',
            'cnp' => 'required|string|min:1|max:10',
            'seria_nr' => 'required|string|min:1|max:10',
            'city' => 'required',
            'seria' => 'required',
            'identity_card_type' => 'required',
    
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
        $data = $this->only(['first_name','last_name','email','phone_number','adress','cnp','seria_nr','city','seria','identity_card_type']);



        return $data;
    }

}