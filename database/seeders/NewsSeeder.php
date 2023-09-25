<?php

namespace Database\Seeders;

use App\Enums\News\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function fake;
use function now;

class NewsSeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('news')->insert($this->getData());
    }

    public function getData(): array {
        $quantity = 20;
        $news = [];
        for ($i = 0; $i < $quantity; $i++) {
            $news[] = [
                'category_id' => fake()->randomNumber(1,10),
                'title' => fake()->jobTitle(), 
                'image' => fake()->imageUrl(200,150),
                'author' => fake()->userName(),
                'status' => fake()->randomElement(Status::getEnums()),//параметр принимает массив элементов выбора
                'description' => fake()->text(100),
                'created_at' => now(),
            ];
        }
        return $news;
    }

}
