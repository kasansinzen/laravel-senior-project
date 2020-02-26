<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpgradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upgrade', function (Blueprint $table) {
            $table->increments('upgrade_id');
            $table->string('upgrade_accountno');
            $table->string('upgrade_bank');
            $table->string('upgrade_picture')->nullable();
            $table->float('upgrade_amount');
            $table->string('upgrade_name');
            $table->string('upgrade_date');
            $table->string('upgrade_time');
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
        Schema::dropIfExists('upgrade');
    }
}
