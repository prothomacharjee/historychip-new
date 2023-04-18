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
        Schema::create('notice_prompts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200)->unique();
            $table->string('content', 200);
            $table->dateTime('duration_from')->nullable();
            $table->dateTime('duration_to')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notice_prompts');
    }
};
