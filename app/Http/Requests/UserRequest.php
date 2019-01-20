<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|unique:users,name,' . \Auth::id(),
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'must have username.',
            'name.unique' => 'username must be unique.',
            'email.required' => 'must have email',
            'email.email' => 'wrong email format'
        ];
    }
}
