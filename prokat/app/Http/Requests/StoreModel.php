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
            'comment' => 'string|max:255',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'photo1' => 'image',
            'photo2' => 'image',
            'photo3' => 'image',
            'video1' => 'mimes:mp4,webm',
            'video2' => 'mimes:mp4,webm',
            'video3' => 'mimes:mp4,webm',
            'description1' => 'required|string|max:255',
            'description2' => 'required|string|max:255',
            'description3' => 'required|string|max:255'
        ];
    }
}
