<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");

            $table->foreign("user_id")->references("id")->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger("post_id");

            $table->foreign("post_id")->references("id")->on('posts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text("comment");
         
            $table->unsignedBigInteger("parent_comment_id")->nullable();

            $table->foreign("parent_comment_id")->references("id")->on('comments')->cascadeOnDelete()->cascadeOnUpdate();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
