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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id',false,true);
            $table->integer('partner_id')->nullable();
            $table->string('pen_name')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->text('bio')->nullable();
            $table->string('dob')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('facebook_page_link')->nullable();
            $table->string('twitter_page_link')->nullable();
            $table->string('linkedin_page_link')->nullable();
            $table->string('instagram_page_link')->nullable();
            $table->tinyInteger('is_pic_public')->default(0);
            $table->tinyInteger('is_social_media_public')->default(0);
            $table->tinyInteger('is_bio_public')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
