<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('main_image')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();

            $table->string('title_az');
            $table->string('title_ru');
            $table->string('title_en');

            $table->decimal('price', 10, 2)->nullable();

            $table->longText('description_az')->nullable();
            $table->longText('description_ru')->nullable();
            $table->longText('description_en')->nullable();

            $table->longText('usage_az')->nullable();
            $table->longText('usage_ru')->nullable();
            $table->longText('usage_en')->nullable();

            $table->longText('indications_az')->nullable();
            $table->longText('indications_ru')->nullable();
            $table->longText('indications_en')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};