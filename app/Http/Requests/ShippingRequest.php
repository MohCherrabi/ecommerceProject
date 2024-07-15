<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingRequest extends FormRequest
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
            'payment_mode_id' => 'required|exists:payment_modes,id',
            'status_id' => 'required|exists:statuses,id',
            'shipping_address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'shipping_method' => 'nullable|string|max:50',
            'tracking_number' => 'nullable|string|max:100',
            'shipping_date' => 'nullable|date',
            'estimated_delivery_date' => 'nullable|date|after_or_equal:shipping_date',
            'delivery_status' => 'nullable|string|max:50',
            'shipping_cost' => 'nullable|numeric|min:0',
            ];
    }
}
