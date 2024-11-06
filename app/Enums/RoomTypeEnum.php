<?php

namespace App\Enums;

abstract class RoomTypeEnum
{
    const Table = 'room_types';

    const Id = 'id';
    const Name = 'name';

    const Fillable = [self::Name];
}
