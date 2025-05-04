<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ProductUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'description' => 'required|string|max:1000',
            'status' => 'gt:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'brand.required' => 'Brand is required',
            'quantity.required' => 'Quantity is required',
            'quantity.integer' => 'Quantity must be an integer',
            'quantity.min' => 'Quantity must be at least 1',
            'description.required' => 'Description is required',
            'status.gt' => 'Status is required',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
            'price.min' => 'Price must be at least 0',
            'image.image' => 'Image must be an image file',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif',
            'image.max' => 'Image size must not exceed 2MB',
        ];
    }
}
