<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'image' => 'required', // Assuming image upload with specified formats and size limit
            'title' => 'required|string|max:255', // Assuming title is a required string with maximum length of 255 characters
            'description' => 'required|string', // Assuming description is a required string
            'user_id' => 'required|exists:users,id', // Assuming user_id must exist in the users table
            'sub_familie_id' => 'required|exists:sub_families,id', // Assuming sub_familie_id must exist in the sub_families table
        ];
    }
}
