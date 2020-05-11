<?php

namespace App\Http\Requests\Api\Notify;

use App\Http\Requests\Api\FormRequest;

class CreateRequest extends FormRequest
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
            'title' => 'required|string|max:200',
            'content' => 'required|max:4000',
        ];
    }

    /**
     * Messages for validation
     *
     * @return array
     */
    public function messages()
    {
        return [];
    }

    /**
     * Messages for validation
     *
     * @return array
     */
    public function attributes()
    {
        return [];
    }
}