<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePublishedAtToArticles extends Migration
{

    public function up(): void
    {
            DB::statement('ALTER TABLE articles MODIFY COLUMN published_at TIMESTAMP  NULL DEFAULT NULL');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE articles MODIFY COLUMN created_at TIMESTAMP  NOT NULL ');
    }
}
