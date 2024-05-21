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
        Schema::create('paymentregistartion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rieid');
            $table->string('transactionid');
            $table->string('amount', 8, 2);
            $table->enum('paymentstatus', ['y', 'n']);
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
        Schema::dropIfExists('paymentregistartion');
    }
};
