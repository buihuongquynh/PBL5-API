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
        Schema::create('users', function (Blueprint $table) {
            $table->id('userID');
            $table->string('name',50);
            $table->date('birthday');
            $table->string('gender',20);
            $table->string('phoneNumber',20);
            $table->string('email',100);
            $table->string('address',100);
            $table->text('orderHistory');
            $table->bigInteger('cartID');
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
        Schema::dropIfExists('users');
    }
};
