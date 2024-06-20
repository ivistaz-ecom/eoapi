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
        Schema::create('pricepackages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('packagename');
            $table->integer('packageorder');
            $table->decimal('memberfee', total: 8, places: 2);
            $table->decimal('slpfee', total: 8, places: 2);
            $table->integer('numbooked');
            $table->integer('totalcount');
            $table->enum('offerstatus', ['y', 'n'])->default('n');
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
        Schema::dropIfExists('pricepackages');
    }
};
