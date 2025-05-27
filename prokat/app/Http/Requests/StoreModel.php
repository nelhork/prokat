<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModel extends FormRequest
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
            'comment' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'photo1' => 'nullable|image',
            'photo2' => 'nullable|image',
            'photo3' => 'nullable|image',
            'video1' => 'nullable|mimes:mp4,webm',
            'video2' => 'nullable|mimes:mp4,webm',
            'video3' => 'nullable|mimes:mp4,webm',
            'description1' => 'nullable|string|max:255',
            'description2' => 'nullable|string|max:255',
            'description3' => 'nullable|string|max:255'
        ];
    }
}
