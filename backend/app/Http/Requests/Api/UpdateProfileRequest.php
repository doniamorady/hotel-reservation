<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $user = auth()->user();
        return [
            'first_name' => ['sometimes'],
            'last_name' => ['sometimes'],
            'avatar' => ['sometimes', 'image', 'mimes:png,jpg,jpeg,webp'],
            'phone' => ['sometimes', Rule::unique('users', 'phone')->ignore($user->id)]
        ];
    }
}
