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

            $table->integer('edit_count');

            $table->tinyInteger('level')->default(1);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('bill_type');
            $table->integer('max_image_count');
            $table->integer('max_content_length');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('story_categories')->onDelete('cascade');
            $table->foreign('sub_category_id_level_1')->references('id')->on('story_categories')->onDelete('cascade');
            $table->foreign('sub_category_id_level_2')->references('id')->on('story_categories')->onDelete('cascade');
            $table->foreign('sub_category_id_level_3')->references('id')->on('story_categories')->onDelete('cascade');
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
