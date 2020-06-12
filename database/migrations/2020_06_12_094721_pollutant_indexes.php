<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PollutantIndexes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pollutant_indexes', function (Blueprint $table) {
            $table->id();
            $table->integer('batch'); // retrive related batch data when user filter by datetime
            $table->string('location', 60);
            $table->float('pm10_twenty_four_hourly', 8, 2);
            $table->float('pm25_twenty_four_hourly', 8, 2);
            $table->float('co_sub_index', 8, 2);
            $table->float('o3_sub_index', 8, 2);
            $table->float('so2_sub_index', 8, 2);
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
        Schema::dropIfExists('pollutant_indexes');
    }
}
