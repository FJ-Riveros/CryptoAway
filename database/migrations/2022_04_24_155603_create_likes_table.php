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
        Schema::create('likes', function (Blueprint $table) {
            $table->unsignedBigInteger("Post_idPost");
            $table->unsignedBigInteger("user_idUser");
            $table->timestamps();
            $table->foreign("Post_idPost")->references("id")->on("posts");
            $table->foreign("user_idUser")->references("id")->on("users");
            $table->primary(array("Post_idPost", "user_idUser"));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
};
