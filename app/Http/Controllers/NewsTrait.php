<?php

namespace App\Http\Controllers;

trait NewsTrait {
    public function getNews(int $id = null) {
        $news = [];
        if ($id === null) {
            for ($i = 1; $i <= 10; $i++) {
                $news[] = [
                    'id' => $i,
                    'category_id' => random_int(1, 10),
                    'title' => fake()->jobTitle(),
                    'image' => fake()->imageUrl(),
                    'author' => fake()->userName(),
                    'status' => 'ACTIVE',
                    'description' => fake()->text(100),
                    'created' => now()->format('d-m-Y H:i')
                ];
            }
            return $news;
        }

        return [
            'id' => $id,
            'category_id' => random_int(1, 10),
            'title' => fake()->jobTitle(),
            'image' => fake()->imageUrl(),
            'author' => fake()->userName(),
            'status' => 'ACTIVE',
            'description' => fake()->text(100),
            'created' => now()->format('d-m-Y H:i')
        ];
    }

    public function getCategories(int $id = null) {
        $categories = [];
        if ($id === null) {
            for ($i = 1; $i <= 5; $i++) {
                $categories[] = [
                    'id' => $i,
                    'title' => fake()->jobTitle(),
                ];
            }
            return $categories;
        }
        return[
            'id' => $id,
            'title' => fake()->jobTitle(),
        ];
    }

}
