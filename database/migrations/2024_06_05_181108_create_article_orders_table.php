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
        Schema::create('article_order', function (Blueprint $table) {
            $table->foreignId('article_id')->constrained()->cascadeOnDelete();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->primary(['article_id', 'order_id']);
            $table->string('label');
            $table->float('price');
            $table->integer('quantity');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_order');
    }
};
