<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Enums\HotelEnum;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            HotelEnum::Nit => $this->faker->unique()->numerify('#########'), // NIT de 9 dígitos
            HotelEnum::Name => $this->faker->company,
            HotelEnum::CityName => $this->faker->city,
            HotelEnum::Address => $this->faker->address,
            HotelEnum::CountRooms => $this->faker->numberBetween(10, 500), // Número de habitaciones
        ];
    }
}
