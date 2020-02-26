<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name');
            $table->integer('product_unit', false, true);
            $table->float('product_price');
            $table->text('product_description')->nullable();
            $table->string('product_picture')->nullable();
            $table->integer('producttype_id', false, true);
            $table->integer('user_id', false, true);

            $table->foreign('producttype_id')
              ->references('producttype_id')->on('producttype')
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
        Schema::dropIfExists('product');
    }
}
