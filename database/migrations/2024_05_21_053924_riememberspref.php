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
        Schema::create('riememberspref', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('eoid');
            $table->string('flyingfrom');
            $table->string('dietpref');
            $table->string('allergies');
            $table->string('shirtsize');
            $table->string('interests');
            $table->string('specialrequest');
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
        Schema::dropIfExists('riememberspref');
    }
};
