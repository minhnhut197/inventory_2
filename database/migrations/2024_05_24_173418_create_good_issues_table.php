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
        Schema::create('good_issues', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('item');
            $table->string('creator');
            $table->integer('warehouse_type');
            $table->integer('customer');
            $table->decimal('total_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('good_issues');
    }
};
