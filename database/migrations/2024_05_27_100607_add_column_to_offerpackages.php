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
        Schema::table('offerpackages', function (Blueprint $table) {
            $table->string('chapter')->nullable();
            $table->string('region')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offerpackages', function (Blueprint $table) {
            $table->dropColumn('chapter');
            $table->dropColumn('region');
        });
    }
};
