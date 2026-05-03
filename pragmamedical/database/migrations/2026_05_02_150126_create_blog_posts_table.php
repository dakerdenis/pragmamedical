<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();

            $table->string('main_image')->nullable();

            $table->string('title_az');
            $table->string('title_ru');
            $table->string('title_en');

            $table->date('published_date')->nullable();

            $table->longText('description_az')->nullable();
            $table->longText('description_ru')->nullable();
            $table->longText('description_en')->nullable();

            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};