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
        Schema::create('shopping_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shopping_id');
            $table->foreign('shopping_id')->references('id')->on('shoppings')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->integer('amount')->default(0);
            $table->decimal('price_shopping', 10,2)->default(0);
            $table->decimal('price_sale', 10,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_details');
    }
};
