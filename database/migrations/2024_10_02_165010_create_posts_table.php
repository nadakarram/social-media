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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");

            $table->foreign("user_id")->references("id")->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('post_content');
            $table->enum('privacy_setting',[ "public", "friends only", "private"]);
            $table->string('tags');
            $table->integer("like_count");
            
            $table->integer("share_count");
            $table->integer("comment_count");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
