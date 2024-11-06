<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Enums\HotelEnum;

class StoreHotelRequest extends FormRequest
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
            HotelEnum::Nit => 'required|string|max:255|unique:hotels',
            HotelEnum::Name => 'required|string|max:255',
            HotelEnum::CityName => 'required|string|max:255',
            HotelEnum::Address => 'required|string|max:255',
            HotelEnum::CountRooms => 'required|integer|min:1',
        ];
    }
}
