<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email,',
            'name' => 'required|string|max:255',
            'user_catalogue_id' => 'gt:0',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|same:password',
            'phone' => 'required|string|max:255',
            'provinnce_id' => 'required/string|max:255',
            'district_id' => 'required|string|max:255',
            'ward_id' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.unique' => 'Email already exists',
            'fullname.required' => 'Fullname is required',
            'user_catalogue_id.required' => 'User group is required',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
            'password.confirmed' => 'Password confirmation does not match',
            'phone.required' => 'Phone is required',
            'provinnce_id.required' => 'Provinnce is required',
            'district_id.required' => 'District is required',
            'ward_id.required' => 'Ward is required',
            'address.required' => 'Address is required',
        ];
    }
}
