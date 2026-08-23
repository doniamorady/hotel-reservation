<?php

namespace App\Http\Requests\Booking;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateBookingRequest extends FormRequest
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
            'start_date' => ['required', 'date', 'before_or_equal:end_date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'user_id' => ['required', 'exists:users,id'],
            'room_id' => ['required', 'exists:rooms,id'],
            'num_nights' => ['required', 'integer', 'min:1'],
            'num_guests' => ['required', 'integer', 'min:1'],
            'has_breakfast' => ['required', 'boolean'],
            'breakfast_price' => ['required', 'numeric', 'min:0'],
            'room_price' => ['required', 'numeric', 'min:0'],
            'total_price' => ['required', 'numeric', 'min:0'],
        ];
    }
}
