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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_group_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('password');
            $table->string('token_2fa')->nullable();
            $table->date('token_2fa_expiry')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('reset_token')->nullable();
            $table->tinyInteger('is_available')->default(1);
            $table->timestamps();
            $table->foreign('admin_group_id')->references('id')->on('admin_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
