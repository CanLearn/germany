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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 14)->nullable();
            $table->string('code_phone_verify', 6)->nullable();
            $table->string('position_site')->nullable();
            $table->string('address')->nullable();
            $table->string('code_post')->nullable();
            $table->string('image')->nullable()->default(asset('images/avatar.jpg'));
            $table->string('website')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->string('ip')->nullable();
            $table->string('cart_number', 16)->nullable();
            $table->string('shaba_cart', 24)->nullable();
            $table->boolean('email_on_follow')->default(false);
            $table->boolean('email_on_like')->default(false);
            $table->boolean('email_on_reply')->default(true);
            $table->text('bio')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('status', \App\Models\User::$statuses)->default('active');
            $table->timestamp('last_seen')->nullable();
//            $table->boolean('is_teacher')->default(false);
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
