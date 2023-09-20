<?php

use App\Enums\News\Status;
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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                    ->constrained('categories')
                    ->cascadeOnDelete();
            $table->string('title');
            $table->string('author',100)->defaul('Admin');
            $table->string('image')->nullable();
            $table->enum('status', Status::getEnums()); // Status::getEnums() массив "список" всех значений для базы данных
            $table->timestamps();
            $table->index('status'); // индексировать поля колонки status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
