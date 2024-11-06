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
                "\nRoom Type creado: Nombre: %s \n",
                $roomType->name
            ));

            $this->command->getOutput()->progressAdvance();
            usleep(500000);
        }

        $this->command->getOutput()->progressFinish();
        $this->command->info("\nSe han creado todos los tipos de habitación.\n");
    }
}
