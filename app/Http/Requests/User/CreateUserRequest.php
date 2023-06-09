<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'firstname' => 'required|max:30|min:2',
            'lastname' => 'required|max:30|min:2',
            'middlename' => 'required|max:30|min:2',
            'address' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable'
        ];
    }
}
