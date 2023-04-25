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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('blog_title')->unique();
            $table->longText('blog_description');
            $table->date('blog_date');
            $table->string('blog_banner')->nullable();
            $table->string('blog_banner_alt_text')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_draft')->default(0);
            $table->tinyInteger('is_featured')->default(0);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
