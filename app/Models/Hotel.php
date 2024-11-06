<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Enums\HotelEnum;

class Hotel extends Model
{
    /** @use HasFactory<\Database\Factories\HotelFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = HotelEnum::Table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = HotelEnum::Fillable;

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
        if (is_array($value)) return $query->whereIn(HotelEnum::Id, $value);
        return $query->where(HotelEnum::Id, $value);
    }

    /**
     * Scope a query to only include Nit
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param string $nit
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByNit($query, $value)
    {
        return $query->where(HotelEnum::Nit, 'like', "%$value%");
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
        return $query->where(HotelEnum::Name, 'like', "%$value%");
    }

    /**
     * Scope a query to only include City Name
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param string $value
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByCityName($query, $value)
    {
        return $query->where(HotelEnum::CityName, 'like', "%$value%");
    }
}
