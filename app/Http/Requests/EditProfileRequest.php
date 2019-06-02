<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
        $rules = getTableRequestRules('users');
        $rules['email'] .= '|unique:users,email,' . \Auth::user()->id;
        $rules['phone_number'] = 'nullable|numeric|digits:10';
        unset($rules['password']);
        unset($rules['isAnonymized']);

        return $rules;
    }
}