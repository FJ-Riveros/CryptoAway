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
        Schema::create('user_has_trips', function (Blueprint $table) {
            $table->unsignedBigInteger("user_idUser");
            $table->unsignedBigInteger("trips_idTrip");
            $table->timestamps();
            $table->foreign("user_idUser")->references("id")->on("users");
            $table->foreign("trips_idTrip")->references("idTrip")->on("trips");
            $table->primary(array("user_idUser", "trips_idTrip"));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_has_trips');
    }
};
