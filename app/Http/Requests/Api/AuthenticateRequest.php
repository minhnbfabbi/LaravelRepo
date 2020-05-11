<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\FormRequest;

class AuthenticateRequest extends FormRequest
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
        return [
            'email' => 'required|email|max:200',
            'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/'
        ];
    }

    public function messages()
    {
    	return [

    	];
    }

    public function attributes()
    {
    	return [

    	];
    }
}