<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{

    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('delivered');
            $table->string('paid');
            $table->string('status');

            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}
