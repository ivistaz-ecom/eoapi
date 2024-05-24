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
        Schema::create('slpregistration', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->enum('gender', ['m', 'f'])->default('f');
            $table->string('mobile');
            $table->string('industry')->nullable();
            $table->string('company')->nullable();
            $table->string('companyaddr')->nullable();
            $table->string('gstno')->nullable();
            $table->enum('regstatus', ['y', 'n'])->default('y');
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
        Schema::dropIfExists('slpregistration');
    }
};
