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
        Schema::table('riemembers', function (Blueprint $table) {
            $table->string('addr1');
            $table->string('addr2');
            $table->string('city');
            $table->string('state');
            $table->string('pin');
            $table->string('country');
            $table->string('comaddr1');
            $table->string('comaddr2');
            $table->string('comcity');
            $table->string('comstate');
            $table->string('compin');
            $table->string('comcountry');
            $table->dropColumn('companyaddr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('riemembers', function (Blueprint $table) {
            //
        });
    }
};
