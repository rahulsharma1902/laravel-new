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
        Schema::create('pricevariations', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('product_sku');
            $table->string('product_slug');
            $table->string('bundel_price');
            $table->string('bundel_quantity');
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
        Schema::dropIfExists('pricevariations');
    }
};
