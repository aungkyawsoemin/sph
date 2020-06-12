<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWeatherIndexesAddSourceOfData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weather_indexes', function (Blueprint $table) {
            $table->string('sourceOfData', 10)->default('API')->nullable()->after('air_temp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weather_indexes', function (Blueprint $table) {
            $table->dropColumn('sourceOfData');
        });
    }
}
