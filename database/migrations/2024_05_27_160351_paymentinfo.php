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
        Schema::create('paymentinfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('region');
            $table->decimal('amount', total: 8, places: 2);
            $table->string('email');
            $table->string('phone');
            $table->string('company');
            $table->string('companyaddr');
            $table->string('symbol');
            $table->string('currency');
            $table->string('voucher');
            $table->date('exprdt');
            $table->integer('spouseid');
            $table->string('spousestatus');
            $table->string('txnid');
            $table->enum('paymentstatus', ['yes', 'no'])->default('no');
            $table->enum('memregstatus', ['yes', 'no'])->default('no');
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
        Schema::dropIfExists('paymentinfo');
    }
};
