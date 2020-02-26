<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer', function (Blueprint $table) {
            $table->increments('dealer_id');
            $table->string('dealer_name');
            $table->string('dealer_tel');
            $table->string('dealer_email')->unique();
            $table->string('dealer_picture')->nullable();
            $table->integer('user_id', false, true);

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
        Schema::dropIfExists('dealer');
    }
}
