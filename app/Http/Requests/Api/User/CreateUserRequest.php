<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

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

        return [
            'first_name' => ['nullable', 'string'],
            'last_name' => ['nullable', 'string'],
            'avatar' => ['nullable', 'string'],
            'email' => ['nullable', 'email', 'unique:users,email', 'required_without:phone'],
            'phone' => ['nullable', 'string', 'unique:users,phone', 'size:11', 'required_without:email'],
            'password' =>['nullable','string', 'min:8']
        ];
    }
}
