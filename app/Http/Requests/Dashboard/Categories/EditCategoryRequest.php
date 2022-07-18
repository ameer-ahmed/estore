<?php

namespace App\Http\Requests\Dashboard\Categories;

use Illuminate\Foundation\Http\FormRequest;

class EditCategoryRequest extends FormRequest
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
        $rules = [
            'change_image' => [
                'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            ],
            'update_category' => [
                'name_en' => 'required',
                'name_ar' => 'required',
                'slug' => 'required|unique:categories,slug,'.session()->get('category_id'),
            ]
        ];
        if(request()->get('upload') === 'change_image') {
            return $rules['change_image'];
        } elseif(request()->get('update_category') === 'details') {
            return $rules['update_category'];
        } else {
            return [];
        }
    }

    public function messages()
    {
        return [
            'image.required' => 'Select an image first.',
            'image.mimes' => 'Supported extensions are jpg, jpeg and png.',
            'image.max' => 'Max image size is 5 MB.',
            'name_en.required' => 'Required field.',
            'name_ar.required' => 'Required field.',
            'slug.required' => 'Required field.',
            'slug.unique' => 'This slug is used before.',
        ];
    }
}
