<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequests extends FormRequest
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
            'fname' => 'required|max:100|string',
            'lname' => 'max:100',
            'username' => 'required|max:50|alpha_dash|unique:users,username,'.$this->user->id,
            'role_id' => 'required|numeric',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => '',
            'avatar' => 'image|file|max:2048',
        ];
    }
}
