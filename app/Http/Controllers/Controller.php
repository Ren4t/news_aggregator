<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {

    use AuthorizesRequests,
        ValidatesRequests;

    public function getNews(int $id = null) {
        $news = [];
        if ($id === null) {
            for ($i = 1; $i <= 10; $i++) {
                $news[] = [
                    'id' => $i,
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
