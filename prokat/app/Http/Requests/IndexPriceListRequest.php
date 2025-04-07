<?php

namespace App\Http\Requests;

class IndexPriceListRequest extends BaseFormRequest
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
            'model_id' => 'required|exists:models,id',
            'begin' => 'required|date',
            'end' => 'required|date'
        ];
    }
}
