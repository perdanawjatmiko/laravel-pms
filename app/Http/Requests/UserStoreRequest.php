<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fname' => ['required', 'string', 'max:100'],
            'lname' => ['max:100'],
            'username' => ['required', 'alpha_dash', 'max:50', 'unique:users'],
            'role_id' => ['required' ,'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'avatar' => ['image', 'file', 'max:2048', 'nullable'],
        ];
    }
}
