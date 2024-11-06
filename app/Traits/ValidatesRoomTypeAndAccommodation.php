<?php

namespace App\Traits;

use Illuminate\Validation\Validator;

use App\Enums\RoomEnum;
use App\Enums\RoomTypeEnum;
use App\Enums\RoomAccommodationEnum;

trait ValidatesRoomTypeAndAccommodation
{
    /**
     * Validate conditions for Room
     */
    public function validateRoomTypeAndAccommodation(Validator $validator)
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
