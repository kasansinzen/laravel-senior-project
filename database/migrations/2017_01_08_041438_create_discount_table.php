<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount', function (Blueprint $table) {
            $table->increments('discount_id');
            $table->integer('discount_unit', false, true);
            $table->integer('discount_percent', false, true);
            $table->integer('product_id', false, true);
            $table->integer('dealer_id', false, true);
            $table->integer('discount_result', false, true);
            $table->integer('user_id', false, true);

            $table->foreign('product_id')
              ->references('product_id')->on('product')
              ->onDelete('cascade')
              ->onUpdate('cascade');
            $table->foreign('dealer_id')
              ->references('dealer_id')->on('dealer')
              ->onDelete('cascade')
              ->onUpdate('cascade');
            $table->foreign('user_id')
              ->references('user_id')->on('users')
              ->onDelete('cascade')
              ->onUpdate('cascade');

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
        Schema::dropIfExists('discount');
    }
}
