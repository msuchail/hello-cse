<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'nom' => 'string|min:3|max:30|alpha',
            'prenom' => 'string|min:3|max:30|alpha',
            'email' => 'email|unique:profiles,email',
            'description' => '',
            'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg',
            'statut' => 'in:active,inactive,pending',
        ];
    }
}
