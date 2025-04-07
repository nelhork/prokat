<?php

namespace App\Http\Requests;

class IndexOrderRequest extends BaseFormRequest
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
            'status' => 'exists:statuses,name',
            'name' => 'string',
            'phone1' => 'string',
            'phone2' => 'string',
            'phone3' => 'string',
            'comment' => 'string',
            'client_id' => 'exists:clients,id',
            'begin_at' => 'date',
            'end_at' => 'date',
            'total_amount' => 'numeric',
            'total_deposit' => 'numeric',
            'giver_id' => 'exists:employees,id',
            'taker_id' => 'exists:employees,id',
            'give_stock_id' => 'exists:stocks,id',
            'take_stock_id' => 'exists:stocks,id',
            'models' => 'boolean'
        ];
    }
}
