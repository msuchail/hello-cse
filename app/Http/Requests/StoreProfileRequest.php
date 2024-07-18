<?php

namespace App\Http\Requests;

use HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
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
            'nom' => 'required|string|min:3|max:30|alpha',
            'prenom' => 'required|string|min:3|max:30|alpha',
            'email' => 'required|email|unique:profiles,email',
            'description' => 'required',
            'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg',
            'statut' => 'required|in:active,inactive,pending',
        ];
    }
}
