<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Enums\RoomAccommodationEnum;

class RoomAccommodation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = RoomAccommodationEnum::Table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = RoomAccommodationEnum::Fillable;

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
        if (is_array($value)) return $query->whereIn(RoomAccommodationEnum::Id, $value);
        return $query->where(RoomAccommodationEnum::Id, $value);
    }

    /**
     * Scope a query to only include Name
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param string $value
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByName($query, $value)
    {
        return $query->where(RoomAccommodationEnum::Name, 'like', "%$value%");
    }
}
