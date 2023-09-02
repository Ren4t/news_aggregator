<?php
declare(strict_types=1);

namespace App\Http\Controllers;

trait NewsTrait {
    
    public function getNews(int $id = null): array {
        $news = [];
        $quantityNews = 10;
        if($id === null)
        {
            for($i = 1;$i<$quantityNews;$i++)
            {
                $news[$i] = [
                    'id' => $i,
                    'category_id' => random_int(1, 5),
                    'title' => fake()->jobTitle(),
                    'description' => fake()->text(100),
                    'autor' => fake()->userName(),
                    'created_at' => now()->format('d-m-Y H:i')
                ];
            }
            return $news;
        }
        return [
                    'id' => $id,
                    'title' => fake()->jobTitle(),
                    'description' => fake()->text(100),
                    'autor' => fake()->userName(),
                    'created_at' => now()->format('d-m-Y H:i')
                ];
    }
}
