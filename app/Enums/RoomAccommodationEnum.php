<?php

namespace App\Enums;

abstract class RoomAccommodationEnum
{
    const Table = 'room_accommodations';

    const Id = 'id';
    const Name = 'name';

    const Fillable = [self::Name];

    const SimpleId = 1;
    const DoubleId = 2;
    const TripleId = 3;
    const QuadrupleId = 4;
}
