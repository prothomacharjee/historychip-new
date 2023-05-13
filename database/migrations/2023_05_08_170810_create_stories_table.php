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
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('sub_category_id_level_1')->nullable();
            $table->unsignedBigInteger('sub_category_id_level_2')->nullable();
            $table->unsignedBigInteger('sub_category_id_level_3')->nullable();

            $table->string('title');
            $table->unsignedBigInteger('author_id')->nullable();
            $table->longText('context')->nullable();

            $table->integer('edit_count')->default(0);

            $table->string('author_name');

            $table->string('photo_credit')->nullable();
            $table->string('audio_credit')->nullable();
            $table->string('video_credit')->nullable();

            $table->tinyInteger('is_anonymous')->default(0);
            $table->tinyInteger('is_approved')->default(0);

            $table->string('event_dates')->nullable();
            $table->string('event_detail_dates')->nullable();
            $table->string('event_location')->nullable();
            $table->string('header_image_path')->nullable();
            $table->string('audio_path')->nullable();
            $table->string('video_path')->nullable();
            $table->longText('tags')->nullable();

            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};
