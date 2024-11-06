<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Enums\RoomEnum;
use App\Enums\RoomTypeEnum;
use App\Enums\RoomAccommodationEnum;

class UpdateRoomRequest extends FormRequest
{
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
            RoomEnum::RoomTypeId => ['sometimes', 'integer', sprintf('exists:%s,%s', RoomTypeEnum::Table, RoomTypeEnum::Id)],
            RoomEnum::RoomAccommodationId => ['sometimes', 'integer', sprintf('exists:%s,%s', RoomAccommodationEnum::Table, RoomAccommodationEnum::Id)],
            RoomEnum::CountRooms => ['sometimes', 'integer', 'min:1'],
        ];
    }
}
