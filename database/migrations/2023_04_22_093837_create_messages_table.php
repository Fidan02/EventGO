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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('sender_msg');
            $table->text('reciever_msg');
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('reciever_id');
            $table->foreign('reciever_id')->references('id')->on('users');
            $table->foreign('sender_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
