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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->integer('partner_type_id');
            $table->uuid('uuid');
            $table->string('name')->unique();
            $table->string('email');
            $table->string('banner');
            $table->string('banner_alt_text')->nullable();
            $table->string('title');
            $table->longText('description');
            $table->string('logo');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
