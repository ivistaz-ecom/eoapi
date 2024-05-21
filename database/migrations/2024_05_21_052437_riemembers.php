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
        Schema::create('riemembers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('eoid');
            $table->string('gender');
            $table->string('mobile');
            $table->string('industry');
            $table->string('company');
            $table->string('gstno');
            $table->string('companyaddr');
            $table->string('spouseid')->default('0');
            $table->string('regstatus')->default('no');
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
        Schema::dropIfExists('riemembers');
    }
};
