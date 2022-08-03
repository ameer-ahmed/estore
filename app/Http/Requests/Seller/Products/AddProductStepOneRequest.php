<?php

namespace App\Http\Requests\Seller\Products;

use Illuminate\Foundation\Http\FormRequest;

class AddProductStepOneRequest extends FormRequest
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
            'init_name_en' => 'required',
            'init_name_ar' => 'required',
            'init_price' => 'required|numeric|min:0',
            'category' => 'required|exists:categories,slug',
            'option_number.*' => 'sometimes|required|numeric|min:1',
            'option.*' => 'sometimes|required|exists:product_option_existed_settings,key',
        ];
    }

    public function messages()
    {
        return [
            'init_name_en.required' => 'Required field.',
            'init_name_ar.required' => 'Required field.',
            'init_price.required' => 'Required field.',
            'init_price.numeric' => 'Numeric field.',
            'init_price.min' => 'Inappropriate value.',
            'category.required' => 'Required field.',
            'category.exists' => 'Not existed category.',
            'option_number.*.required' => 'Required field.',
            'option_number.*.numeric' => 'Numeric field.',
            'option_number.*.min' => 'Inappropriate value.',
            'option.*.required' => 'Required field.',
            'option.*.exists' => 'Not existed option.',
        ];
    }
}
