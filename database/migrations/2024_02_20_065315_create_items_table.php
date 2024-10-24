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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->integer('category')->nullable();
            $table->integer('supplier')->nullable();
            $table->integer('quantity')->nullable()->default(0);
            $table->string('unit')->nullable();
            $table->decimal('selling_price')->nullable();
            $table->decimal('purchase_price')->nullable();
            $table->integer('stock_out_alert')->nullable()->default(5);
            $table->string('description')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->dateTime('entry_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
