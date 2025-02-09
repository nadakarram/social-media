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
        Schema::create('friends', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");

            $table->foreign("user_id")->references("id")->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger("folow_user2_id");

            $table->foreign("folow_user2_id")->references("id")->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum("state",["pending", "accepted", "blocked"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friends');
    }
};
