<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->increments('payment_id');
            $table->string('payment_bank');
            $table->string('payment_accountno');
            $table->string('payment_name');
            $table->string('payment_description')->nullable();
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
        Schema::dropIfExists('paymeny');
    }
}
