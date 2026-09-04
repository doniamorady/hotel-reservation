<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class CreateUserRequest extends FormRequest
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

        $user = $this->route('user');

        return [
            'first_name' => ['nullable', 'string'],
            'last_name' => ['nullable', 'string'],
            'avatar' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp'],
            'phone' => ['required', Rule::unique('users', 'phone')->ignore($user->id), 'regex:/^(?:\+98|98|0)?9\d{9}$/'],
            'password' => ['required', 'string', Password::min(8)->letters()->numbers()->symbols()],
        ];
    }
}
