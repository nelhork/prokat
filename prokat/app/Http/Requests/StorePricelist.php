<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePricelist extends FormRequest
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
            'price_for_period' => 'required|numeric',
            'deposit_for_period' => 'required|numeric',
            'full_price_for_period' => 'required|numeric',
            'period_min' => 'required|numeric',
            'period_max' => 'required|numeric',
            'model_id' => 'required|exists:models,id',
        ];
    }
}
