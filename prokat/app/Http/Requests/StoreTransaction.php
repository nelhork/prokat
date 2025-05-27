<?php

namespace App\Http\Requests;

use App\Models\Account;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

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
            'secondary_account_id' => [
                function ($attribute, $value, $fail)
                {
                    if ($this->input('type') === 'перемещение')
                    {
                        if ($value === $this->input('primary_account_id')) {
                            $fail('Счета должны быть разными');
                        }

                        if (!Account::where('id', $value)->exists())
                        {
                            $fail('Поле Дополнительный счет не выбрано');
                        }
                    }
                }
            ],
            'spending_category_id' => 'nullable|exists:spending_categories,id',
            'income_source_id' => 'nullable|exists:income_sources,id',
            'project_id' => 'nullable|exists:projects,id',
            'order_id' => 'nullable|exists:orders,id',
        ];
    }
}
