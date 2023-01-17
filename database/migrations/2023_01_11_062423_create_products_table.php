<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('Productname')->unique;
            $table->string('slug')->nullable();
            $table->string('description');
            $table->string('Short Description')->nullable();
            $table->string('price');
            $table->string('sale_price')->nullable();
            $table->string('category')->nullable();
            $table->string('tag')->nullable();
            $table->string('image');
            $table->string('sku')->unique();
            $table->integer('quantity');
            $table->string('manage_stock')->nullable();
            $table->integer('status')->default(1);
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
