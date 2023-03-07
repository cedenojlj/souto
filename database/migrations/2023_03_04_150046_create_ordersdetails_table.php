<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ordersdetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('amount')->default(0);
            $table->float('notes', 8, 2)->default(0);
            $table->float('finalprice', 8, 2)->default(0);
            $table->integer('qtyone')->default(0);
            $table->integer('qtytwo')->default(0);
            $table->integer('qtythree')->default(0);                     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordersdetails');
    }
};