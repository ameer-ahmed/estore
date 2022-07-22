<?php

namespace App\Http\Requests\Admin\Categories;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
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
            'name_en' => 'required',
            'name_ar' => 'required',
            'slug' => 'required|unique:categories',
            'image' => 'mimes:jpg,png,jpeg|max:5048',
            'is_active' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => 'Required field.',
            'name_ar.required' => 'Required field.',
            'slug.required' => 'Required field.',
            'is_active.required' => 'Required field.',
            'slug.unique' => 'This slug is used before.',
            'image.mimes' => 'Supported extensions are jpg, jpeg and png.',
            'image.max' => 'Max image size is 5 MB.',
            'is_active.boolean' => 'Irrelevant value.'
        ];
    }
}
