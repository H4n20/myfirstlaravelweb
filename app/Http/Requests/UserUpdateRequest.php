<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserUpdateRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email' . ($this->user ? ',' . $this->user->id : ''),
            'name' => 'required|string|max:255',
            'user_catalogue_id' => 'gt:0',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.unique' => 'Email already exists',
            'name.required' => 'Name is required',
            'user_catalogue_id.required' => 'Group is required',
        ];
    }
}
