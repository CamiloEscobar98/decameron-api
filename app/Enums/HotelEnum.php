<?php

namespace App\Enums;

abstract class HotelEnum
{
    const Table = 'hotels';

    const Id = 'id';
    const Nit = 'nit';
    const Name = 'name';
    const CityName = 'city_name';
    const Address = 'address';
    const CountRooms = 'count_rooms';

    const Fillable = [
        self::Nit,
        self::Name,
        self::CityName,
        self::Address,
        self::CountRooms
    ];
}
