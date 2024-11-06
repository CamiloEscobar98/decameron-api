<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\RoomAccommodation;

class RoomAccommodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accommodations = ['Sencilla', 'Doble', 'Triple', 'Cuádruple'];

        $this->command->getOutput()->progressStart(count($accommodations));

        foreach ($accommodations as $index => $name) {
            $accommodation = RoomAccommodation::create(['name' => $name]);
            $this->command->info(sprintf(
                "Acomodación creada: %s - ID: %d",
                $accommodation->name,
                $accommodation->id
            ));

            $this->command->getOutput()->progressAdvance();
            sleep(1);
        }

        $this->command->getOutput()->progressFinish();
        $this->command->info("Acomodaciones de habitación creadas con éxito.");
    }
}
