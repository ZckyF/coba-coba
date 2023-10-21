<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OutletRequest extends FormRequest
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
            'business_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'show_tax_note' => 'required|boolean',
            'tax_amount' => 'required|numeric|between:0,999.99',
            'taxpayer_name' => 'nullable|string|max:255',
            'taxpayer_address' => 'nullable|string|max:255',
            'nopd' => 'nullable|string|max:255',
            'npwpd' => 'nullable|string|max:255',
            'opening_hours' => 'nullable|string|max:255',
            'print_memo' => 'required|boolean',
            'print_kitchen_memo' => 'required|boolean',
            'active_until' => 'nullable|date',
        ];
    }
}
