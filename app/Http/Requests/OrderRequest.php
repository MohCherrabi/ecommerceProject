<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
public function authorize():bool
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
            'date' => 'required|date',
            'hour' => 'required|date_format:H:i',
            'payment' => 'required',
            'payment_mode_id' => 'required|exists:payment_modes,id',
            'status_id' => 'required|exists:statuses,id',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
