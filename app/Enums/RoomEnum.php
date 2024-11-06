<?php

namespace App\Enums;

abstract class RoomEnum
{
    const Table = 'rooms';

    const Id = 'id';
    const RoomTypeId = 'room_type_id';
    const RoomAccommodationId = 'room_accommodation_id';
    const CountRooms = 'count_rooms';

    const Fillable = [
        self::RoomTypeId,
        self::RoomAccommodationId,
        self::CountRooms
    ];
}
