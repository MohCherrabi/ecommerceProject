<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubProductRequest extends FormRequest
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
            'barcode' => 'required|integer|min:0',
            'designation' => 'required|string|max:255',
            'price_ht' => 'required|numeric|min:0',
            'new_price_ht' => 'nullable|numeric|min:0|less_than_price_ht:price_ht',
            'VAT' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'sub_familie_id' => 'required|exists:sub_families,id',
            'unit_id' => 'required|exists:units,id',
            'brand_id' => 'required|exists:brands,id',
            'product_id' => 'required|exists:products,id',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'new_price_ht.less_than_price_ht' => 'The new price must be less than the current price.',
        ];
    }
}
