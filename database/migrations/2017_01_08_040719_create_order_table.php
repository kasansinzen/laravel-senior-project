<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('order_no');
            $table->integer('order_totaldiscount', false, true);
            $table->integer('order_totalprice', false, true);
            $table->integer('customer_id', false, true);
            $table->integer('orderstatus_id', false, true);
            $table->boolean('isDealer')->nullable();
            $table->integer('user_id', false, true);

            $table->foreign('customer_id')
                ->references('customer_id')->on('customer')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('orderstatus_id')
              ->references('orderstatus_id')->on('orderstatus')
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
        Schema::dropIfExists('order');
    }
}
