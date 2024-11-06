<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Enums\RoomEnum;

class Room extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = RoomEnum::Table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = RoomEnum::Fillable;

    /**
     * Scope a query to only include Id
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param array|int $value
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeById($query, $value)
    {
        if (is_array($value)) return $query->whereIn(RoomEnum::Id, $value);
        return $query->where(RoomEnum::Id, $value);
    }

    /**
     * Scope a query to only include Room Type
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param int $value
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByRoomType($query, $value)
    {
        return $query->where(RoomEnum::RoomTypeId, $value);
    }

    /**
     * Scope a query to only include Room Accommodation
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param int $value
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByRoomAccommodation($query, $value)
    {
        return $query->where(RoomEnum::RoomAccommodationId, $value);
    }

    /**
     * Scope a query to only include Count Rooms
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param int $value
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByCountRooms($query, $value)
    {
        return $query->where(RoomEnum::CountRooms, $value);
    }
}
