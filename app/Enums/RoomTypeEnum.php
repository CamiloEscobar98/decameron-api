<?php

namespace App\Enums;

abstract class RoomTypeEnum
{
    const Table = 'room_types';

    const Id = 'id';
    const Name = 'name';

    const Fillable = [self::Name];

    const StandarId = 1;
    const JuniorId = 2;
    const SuiteId = 3;
}
