<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Enums\HotelEnum;

class UpdateHotelRequest extends FormRequest
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
        $hotelId = $this->route('id');

        return [
            HotelEnum::Nit => 'string|max:255|unique:hotels,nit,' . $hotelId,
            HotelEnum::Name => 'string|max:255',
            HotelEnum::CityName => 'string|max:255',
            HotelEnum::Address => 'string|max:255',
            HotelEnum::CountRooms => 'integer|min:1',
        ];
    }
}
