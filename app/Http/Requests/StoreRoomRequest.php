<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Enums\RoomEnum;
use App\Enums\RoomTypeEnum;
use App\Enums\RoomAccommodationEnum;

use App\Traits\ValidatesRoomTypeAndAccommodation;

class StoreRoomRequest extends FormRequest
{
    use ValidatesRoomTypeAndAccommodation;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            RoomEnum::RoomTypeId => ['required', 'integer', sprintf('exists:%s,%s', RoomTypeEnum::Table, RoomTypeEnum::Id)],
            RoomEnum::RoomAccommodationId => ['required', 'integer', sprintf('exists:%s,%s', RoomAccommodationEnum::Table, RoomAccommodationEnum::Id)],
            RoomEnum::CountRooms => ['required', 'integer', 'min:1'],
        ];
    }

    /**
     * Validate conditions for Room
     */
    public function withValidator($validator)
    {
        $this->validateRoomTypeAndAccommodation($validator);
    }
}
