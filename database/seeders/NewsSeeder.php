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
        $status = function (int $key) {
            switch ($key) {
                case 1:
                    return Status::DRAFT->value;
                case 2:
                    return Status::ACTIVE->value;
                case 3:
                    return Status::BLOCKED->value;
                default:
                    Status::BLOCKED->value;
            }
        };
        $quantity = 20;
        $news = [];
        for ($i = 0; $i < $quantity; $i++) {
            $news[] = [
                'category_id' => random_int(1, 10),
                'title' => fake()->jobTitle(),
                'image' => fake()->imageUrl(200,150),
                'author' => fake()->userName(),
                'status' => $status(random_int(1, 3)),
                'description' => fake()->text(100),
                'created_at' => now(),
            ];
        }
        return $news;
    }

}
