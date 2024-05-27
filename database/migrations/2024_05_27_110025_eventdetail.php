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
        Schema::create('eventdetail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('eventname');
            $table->integer('strdt');
            $table->integer('enddt');
            $table->enum('offerstatus', ['y', 'n'])->default('n');
            $table->string('chapter');
            $table->string('region');
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
        Schema::dropIfExists('eventdetail');
    }
};
