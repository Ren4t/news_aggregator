<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('categories')->insert($this->getData());
    }

    public function getData():array {
        $quantity = 10;
        $categories = [];
        for ($i = 0; $i < $quantity; $i++) {
            $categories[] = [
                'title' => fake()->jobTitle(),
                'description' => fake()->text(100),
                'created_at' => now(),
            ];
        }
        return $categories;
    }
}
    