<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CraeteIntervalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interval', function (Blueprint $table) {
            $table->increments('interval_id');
            $table->dateTime('interval_start');
            $table->dateTime('interval_end');

            $table->integer('user_id',false,true);

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
        Schema::dropIfExists('interval');
    }
}
