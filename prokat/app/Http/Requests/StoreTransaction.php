<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransaction extends FormRequest
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
            'amount' => 'required|numeric',
            'type' => 'required|string|max:255',
            'primary_account_id' => 'required|exists:accounts,id',
            'secondary_account_id' => 'required|exists:accounts,id|different:primary_account_id',
            'spending_category_id' => 'required|exists:spending_categories,id',
            'income_source_id' => 'required|exists:income_sources,id',
            'project_id' => 'required|exists:projects,id',
            'order_id' => 'required|exists:orders,id',
        ];
    }
}
