<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsToRegions extends Migration
{

    public function up(): void
    {
        Schema::table('regions', function (Blueprint $table) {
            $table->renameColumn('RegionID', 'region_id');
            $table->renameColumn('CountryID', 'country_id');
            $table->renameColumn('Region', 'region');
            $table->renameColumn('Code', 'code');
            $table->renameColumn('ADM1Code', 'adm1_code');
        });
    }

    public function down(): void
    {
        Schema::table('regions', function (Blueprint $table) {
            $table->renameColumn('region_id', 'RegionID');
            $table->renameColumn('country_id', 'CountryID');
            $table->renameColumn('region', 'Region');
            $table->renameColumn('code', 'Code');
            $table->renameColumn('adm1_code', 'ADM1Code');
        });
    }
}
