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
        Schema::create('posts', function (Blueprint $table) {
            // $table->idPost()->autoIncrement();
            $table->unsignedBigInteger("idPost")->autoIncrement();
            $table->string('imgPost', 200)->nullable();
            $table->string('textPost', 200);
            $table->unsignedBigInteger("user_idUser");
            $table->foreign("user_idUser")->references("id")->on("users");
            // $table->primary("idPost");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
