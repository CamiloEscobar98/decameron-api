<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();

            $table->unsignedTinyInteger('room_type_id');
            $table->unsignedTinyInteger('room_accommodation_id');

            $table->unsignedSmallInteger('count_rooms');

            $table->timestamps();

            $table->foreign('room_type_id', 'fk_room_types')->references('id')->on('room_types')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('room_accommodation_id', 'fk_room_accommodations')->references('id')->on('room_accommodations')->cascadeOnUpdate()->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
