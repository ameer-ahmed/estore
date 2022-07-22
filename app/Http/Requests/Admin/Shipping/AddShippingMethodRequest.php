<?php

namespace App\Http\Requests\Admin\Shipping;

use Illuminate\Foundation\Http\FormRequest;

class AddShippingMethodRequest extends FormRequest
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
            'start_tariff' => 'required|numeric|gte:0',
            'kilogram_tariff' => 'required|numeric|gte:0',
            'minimum_kilogram_tariff' => 'required|numeric|gte:0',
            'is_active' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => 'Required field.',
            'name_ar.required' => 'Required field.',
            'start_tariff.required' => 'Required field.',
            'start_tariff.numeric' => 'Numeric field.',
            'start_tariff.gte' => 'It must be greater than or equal 0',
            'kilogram_tariff.required' => 'Required field.',
            'kilogram_tariff.numeric' => 'Numeric field.',
            'kilogram_tariff.gte' => 'It must be greater than or equal 0',
            'minimum_kilogram_tariff.required' => 'Required field.',
            'minimum_kilogram_tariff.numeric' => 'Numeric field.',
            'minimum_kilogram_tariff.gte' => 'It must be greater than or equal 0',
            'is_active.required' => 'Required field.',
            'is_active.boolean' => 'Irrelevant value.',
        ];
    }
}
