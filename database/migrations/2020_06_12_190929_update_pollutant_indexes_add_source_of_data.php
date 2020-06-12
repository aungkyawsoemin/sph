<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePollutantIndexesAddSourceOfData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pollutant_indexes', function (Blueprint $table) {
            $table->string('sourceOfData', 10)->default('API')->nullable()->after('so2_sub_index');
            /* DeveloperComment
            * Set Default=API for pervent error when checkout back to master branch without merging
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pollutant_indexes', function (Blueprint $table) {
            $table->dropColumn('sourceOfData');
        });
    }
}
