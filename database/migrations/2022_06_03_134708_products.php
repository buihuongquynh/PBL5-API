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
            $table->id('productID');
            $table->string('name',50);
            $table->bigInteger('boughtPrice');
            $table->bigInteger('sellPrice');
            $table->integer('discount');
            $table->integer('quantity');
            $table->longtext('images');
            $table->float('size');
            $table->string('material',50);
            $table->string('color',50);
            $table->string('category',50);
            $table->unsignedBigInteger('brandID');
            $table->longtext('reviews');
            $table->float('rating');
            $table->foreign('brandID')->references('brandID')->on('brands');
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
