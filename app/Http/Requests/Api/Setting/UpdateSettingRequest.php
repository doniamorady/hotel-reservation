<?php

namespace App\Http\Requests\Api\Setting;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'breakfast_unit_price' => ['nullable'],
            'max_nights'=> ['nullable', 'integer', 'min:1'],
            'max_guests'=> ['nullable', 'integer', 'min:1']
        ];
    }
}
