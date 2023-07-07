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
            $table->string('category_id')->nullable();
            $table->string('sub_category_id_level_1')->nullable();
            $table->string('sub_category_id_level_2')->nullable();
            $table->string('sub_category_id_level_3')->nullable();

            $table->string('title');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('partner_id');

            $table->longText('context')->nullable();

            $table->integer('edit_count')->default(0);
            $table->integer('rejection_count')->default(0);

            $table->string('author_name');

            $table->string('photo_credit')->nullable();
            $table->string('audio_video_credit')->nullable();

            $table->tinyInteger('is_anonymous')->default(0);
            $table->tinyInteger('is_approved')->default(0);
            $table->tinyInteger('is_draft')->default(0);
            $table->tinyInteger('is_audioconvert')->default(0);
            $table->tinyInteger('is_featured')->default(0);

            $table->string('event_dates')->nullable();
            $table->string('event_detail_dates')->nullable();
            $table->string('event_location')->nullable();
            $table->string('header_image_path')->nullable();
            $table->string('header_image_alt_text')->nullable();
            $table->string('audio_video_path')->nullable();

            $table->longText('tags')->nullable();

            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->dateTime('approval_date_time')->nullable();

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
