<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Enums\RoomTypeEnum;

class RoomType extends Model
{
    /** @use HasFactory<\Database\Factories\RoomTypeFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = RoomTypeEnum::Table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = RoomTypeEnum::Fillable;

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
        if (is_array($value)) return $query->whereIn(RoomTypeEnum::Id, $value);
        return $query->where(RoomTypeEnum::Id, $value);
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
        return $query->where(RoomTypeEnum::Name, 'like', "%$value%");
    }
}
