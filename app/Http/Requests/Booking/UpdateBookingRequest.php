<?php

namespace App\Http\Requests\Booking;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
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
            'start_date' => ['sometimes', 'date', 'before_or_equal:end_date'],
            'end_date' => ['sometimes', 'date', 'after_or_equal:start_date'],
            'user_id' => ['sometimes', 'exists:users,id'],
            'room_id' => ['sometimes', 'exists:rooms,id'],
            'num_nights' => ['sometimes', 'integer', 'min:1'],
            'num_guests' => ['sometimes', 'integer', 'min:1'],
            'has_breakfast' => ['sometimes', 'boolean'],
            'breakfast_price' => ['sometimes', 'numeric', 'min:0'],
            'room_price' => ['sometimes', 'numeric', 'min:0'],
            'total_price' => ['sometimes', 'numeric', 'min:0'],
            'status' => ['sometimes', 'string'],
        ];
    }
}
