<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WeatherIndexes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_indexes', function (Blueprint $table) {
            $table->id();
            $table->integer('batch');
            $table->string('device_id', 50);
            $table->string('name', 120);
            $table->decimal('latitude', 11, 8);
            $table->decimal('longitude', 11, 8);
            $table->float('air_temp', 8, 2);
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather_indexes');
    }
}
