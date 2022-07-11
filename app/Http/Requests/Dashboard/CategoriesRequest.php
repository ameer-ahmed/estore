<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => 'Required field.',
            'name_ar.required' => 'Required field.',
            'slug.required' => 'Required field.',
            'slug.unique' => 'This slug is used before.',
            'image.mimes' => 'Supported extensions are jpg, jpeg and png.',
            'image.max' => 'Max image size is 5 MB.'
        ];
    }
}
