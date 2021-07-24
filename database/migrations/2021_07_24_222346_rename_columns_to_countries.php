<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsToCountries extends Migration
{
    public function up(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->renameColumn('CountryId', 'country_id');
            $table->renameColumn('Country', 'country');
            $table->renameColumn('Country', 'country');
            $table->renameColumn('FIPS104', 'fips_104');
            $table->renameColumn('ISO2', 'iso_2');
            $table->renameColumn('ISO3', 'iso_3');
            $table->renameColumn('ISON', 'ison');
            $table->renameColumn('Internet', 'internet');
            $table->renameColumn('Capital', 'capital');
            $table->renameColumn('MapReference', 'map_reference');
            $table->renameColumn('NationalitySingular', 'nationality_singular');
            $table->renameColumn('NationalityPlural', 'nationality_plural');
            $table->renameColumn('Currency', 'currency');
            $table->renameColumn('CurrencyCode', 'currency_code');
            $table->renameColumn('Population', 'population');
            $table->renameColumn('Title', 'title');
            $table->renameColumn('Comment', 'comment');
        });
    }
    
    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->renameColumn('country_id', 'CountryId');
            $table->renameColumn('country', 'Country');
            $table->renameColumn('country', 'Country');
            $table->renameColumn('fips_104', 'FIPS104');
            $table->renameColumn('iso_2', 'ISO2');
            $table->renameColumn('iso_3', 'ISO3');
            $table->renameColumn('ison', 'ISON');
            $table->renameColumn('internet', 'Internet');
            $table->renameColumn('capital', 'Capital');
            $table->renameColumn('map_reference', 'MapReference');
            $table->renameColumn('nationality_singular', 'NationalitySingular');
            $table->renameColumn('nationality_plural', 'NationalityPlural');
            $table->renameColumn('currency', 'Currency');
            $table->renameColumn('currency_code', 'CurrencyCode');
            $table->renameColumn('population', 'Population');
            $table->renameColumn('title', 'Title');
            $table->renameColumn('comment', 'Comment');
        });
    }
}
