<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{

    public function up(): void
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->string('title');
        });
    }


    public function down(): void
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn('title');
        });
    }
}
