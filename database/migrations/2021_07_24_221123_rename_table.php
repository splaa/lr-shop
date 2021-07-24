<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class RenameTable extends Migration
{
    public function up(): void
    {
        Schema::rename('Cities', 'cities');
        Schema::rename('Countries', 'countries');
        Schema::rename('Regions', 'regions');
    }

    public function down(): void
    {
        Schema::rename('cities', 'Cities');
        Schema::rename('countries', 'Countries');
        Schema::rename('regions', 'Regions');
    }
}
