<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'destinations' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'number_of_days' => 'required|integer|min:1',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'schedule' => 'required|string',
            'number_of_guests' => 'required|integer|min:1',
            'available_seats' => 'required|integer|min:1',
            'status' => 'required|in:active,canceled,finished',
            'price' => 'required|numeric|min:0',
        ];
    }
}
