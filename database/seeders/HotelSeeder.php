<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Enums\HotelEnum;

use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotelCount = (int) $this->command->ask('¿Cuántos hoteles desea crear?', 1);

        $this->command->getOutput()->progressStart($hotelCount);

        Hotel::factory()->count($hotelCount)->create()->each(function ($hotel) {
            $this->command->info(sprintf(
                "\nHotel creado: %s - NIT: %s - Ciudad: %s - Dirección: %s - Habitaciones: %d \n",
                $hotel->{HotelEnum::Name},
                $hotel->{HotelEnum::Nit},
                $hotel->{HotelEnum::CityName},
                $hotel->{HotelEnum::Address},
                $hotel->{HotelEnum::CountRooms}
            ));

            usleep(500000);
        });

        $this->command->getOutput()->progressFinish();
        $this->command->info("\nSe han creado {$hotelCount} hoteles exitosamente.\n");
    }
}
