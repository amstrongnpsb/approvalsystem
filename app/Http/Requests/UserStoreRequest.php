<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|unique:users,username',
            'name' => 'required',
            'nik' => 'required|unique:users,nik',
            'role' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'username' => 'Username is required and must be unique!',
            'name' => 'Username is required!',
            'nik' => 'Username is required!',
            'role' => 'Username is required!',
            'email' => 'Username is required and must be unique!',
            'password' => 'Username is required!',
        ];
    }
}
