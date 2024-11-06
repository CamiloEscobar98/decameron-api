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

    /**
     * Validate conditions for Room
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $roomTypeId = $this->input(RoomEnum::RoomTypeId);
            $accommodationId = $this->input(RoomEnum::RoomAccommodationId);

            if ($roomTypeId == RoomTypeEnum::StandarId && !in_array($accommodationId, [RoomAccommodationEnum::SimpleId, RoomAccommodationEnum::DoubleId])) {
                $validator->errors()->add('room_accommodation', 'Para el tipo de habitación Estándar, la acomodación debe ser Sencilla o Doble.');
            }

            if ($roomTypeId == RoomTypeEnum::JuniorId && !in_array($accommodationId, [RoomAccommodationEnum::TripleId, RoomAccommodationEnum::QuadrupleId])) {
                $validator->errors()->add('room_accommodation', 'Para el tipo de habitación Junior, la acomodación debe ser Triple o Cuádruple.');
            }

            if ($roomTypeId == RoomTypeEnum::SuiteId && !in_array($accommodationId, [RoomAccommodationEnum::SimpleId, RoomAccommodationEnum::DoubleId, RoomAccommodationEnum::TripleId])) {
                $validator->errors()->add('room_accommodation', 'Para el tipo de habitación Suite, la acomodación debe ser Sencilla, Doble o Triple.');
            }
        });
    }
}
