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
        Schema::create('comments', function (Blueprint $table) {
            $table->unsignedBigInteger("Post_idPost");
            $table->string("Text", 200);
            $table->unsignedBigInteger("user_idUser");
            $table->timestamps();
            $table->foreign("Post_idPost")->references("idPost")->on("posts");
            $table->foreign("user_idUser")->references("id")->on("users");
            $table->primary("Post_idPost");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
