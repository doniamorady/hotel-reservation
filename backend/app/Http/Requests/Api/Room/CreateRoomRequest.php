<?php

namespace App\Http\Requests\Api\Room;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateRoomRequest extends FormRequest
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
            'name' => ['required'],
            'description' => ['nullable'],
            'cover_image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp'],
            'status' => ['sometimes', 'boolean'],
            'price' => ['required', 'numeric'],
            'bedrooms' => ['required', 'integer'],
            'area' => ['required', 'numeric'],
            'beds' => ['required', 'array'],
            'beds.*' => ['integer', 'exists:beds,id'],
            'gallery_images' => ['nullable', 'array'],
            'gallery_images.*'=>['image', 'mimes:png,jpg,jpeg,webp']
        ];
    }
}
