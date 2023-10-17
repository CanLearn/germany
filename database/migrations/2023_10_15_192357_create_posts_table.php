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
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('image')->nullable();
            $table->text('video')->nullable();
            $table->text('content')->nullable();
            $table->longText('body')->nullable();
            $table->enum('status' , \App\Models\Post::$status)->default(\App\Models\Post::STATUS_PENDING);
            $table->enum('confirmation_post' , \App\Models\Post::$confirmation)->default(\App\Models\Post::CONFIRMATION_BODY);
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
