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
        Schema::create("friends", function (Blueprint $table) {
            $table->unsignedBigInteger("id_friend");
            $table->unsignedBigInteger("id_user");
            $table->integer("actualRequest")->unsigned()->default('1');
            $table->timestamps();
            $table->foreign("id_user")->references("id")->on("users");
            $table->foreign("id_friend")->references("id")->on("users");
            $table->primary(array("id_user", "id_friend"));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends');
    }
};
