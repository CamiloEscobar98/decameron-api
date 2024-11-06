<?php

namespace App\Enums;

abstract class RoomAccommodationEnum
{
    const Table = 'room_accommodations';

    const Id = 'id';
    const Name = 'name';

    const Fillable = [self::Name];
}
