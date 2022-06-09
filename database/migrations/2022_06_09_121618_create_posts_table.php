<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('posts', function (Blueprint $table) 
        {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('extract');
            $table->longText('body');
            $table->enum('status', [1, 2])->default(1);     // 1 → borrador, 2 → publicado
            $table->timestamps();

            // Foreign keys
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
