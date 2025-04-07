<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'status_id' => 'exists:statuses,id',
            'giver_id' => 'exists:employees,id',
            'taker_id' => 'exists:employees,id',
            'begin_at' => 'required|date',
            'end_at' => 'required|date',
            'give_stock_id' => 'required|exists:stocks,id',
            'take_stock_id' => 'exists:stocks,id',
            'comment' => 'string',
            'delivery_address_to' => 'string',
            'delivery_address_from' => 'string',
            'delivery_price' => 'numeric',
            'total_amount' => 'numeric',
            'total_deposit' => 'numeric',
            'models' => 'required|array',
            'models.*.id' => 'required|exists:models,id',
            'models.*.count' => 'required|numeric',
            'models.*.price' => 'required|numeric',
            'models.*.deposit' => 'required|numeric'
        ];
    }
}
