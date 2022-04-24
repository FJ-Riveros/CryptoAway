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
        Schema::create('trips', function (Blueprint $table) {
            $table->unsignedBigInteger("idTrip")->autoIncrement();
            $table->string("itinerary");
            $table->float("price");
            $table->integer("maxGroup");
            $table->date("startDate");
            $table->date("endDate");
            $table->string("img");
            $table->string("destination");
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
        Schema::dropIfExists('trips');
    }
};
