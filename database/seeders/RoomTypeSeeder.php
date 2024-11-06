<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\RoomType;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomTypes = ['Estándar', 'Junior', 'Suite'];

        $this->command->getOutput()->progressStart(count($roomTypes));

        foreach ($roomTypes as $type) {
            $roomType = RoomType::create(['name' => $type]);

            $this->command->info(sprintf(
                "Room Type creado: Nombre: %s",
                $roomType->name
            ));

            $this->command->getOutput()->progressAdvance();
            sleep(1);  // Agrega un pequeño retraso entre creaciones.
        }

        $this->command->getOutput()->progressFinish();
        $this->command->info("Se han creado todos los tipos de habitación: " . implode(', ', $roomTypes));
    }
}
