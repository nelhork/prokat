<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'comment' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone1' => 'required|string|max:255',
            'phone2' => 'required|string|max:255',
            'phone3' => 'required|string|max:255',
            'login' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ];
    }
}
