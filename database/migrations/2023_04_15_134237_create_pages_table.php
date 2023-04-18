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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();
            $table->string('url')->unique();

            $table->string('page_title');

            $table->tinyText('page_group');
            $table->integer('page_group_id')->nullable();

            $table->longText('meta_title')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();

            $table->text('og_image')->nullable();
            $table->text('og_audio')->nullable();
            $table->text('og_video')->nullable();
            $table->text('og_author')->nullable();


            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
