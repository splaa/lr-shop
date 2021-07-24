<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsToCities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->renameColumn('CityId', 'city_id');
            $table->renameColumn('CountryID', 'country_id');
            $table->renameColumn('RegionID', 'region_id');
            $table->renameColumn('City', 'city');
            $table->renameColumn('Latitude', 'latitude');
            $table->renameColumn('Longitude', 'longitude');
            $table->renameColumn('TimeZone', 'time_zone');
            $table->renameColumn('DmaId', 'dma_id');
            $table->renameColumn('Code', 'code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cities', function (Blueprint $table) {
            //
        });
    }
}
