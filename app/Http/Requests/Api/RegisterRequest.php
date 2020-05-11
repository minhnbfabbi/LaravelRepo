<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:200|unique:users',
            'password' => 'required|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/'
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