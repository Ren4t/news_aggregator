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

    public function getData(): array {
        $categories = [
            [
                'title' => 'Спорт',
                'description' => 'Новости спорта',
                'created_at' => now(),
            ],
            [
                'title' => 'Полититка',
                'description' => 'Новости политики',
                'created_at' => now(),
            ],
            [
                'title' => 'Культура',
                'description' => 'Новости культуры',
                'created_at' => now(),
            ],
            [
                'title' => 'Кино',
                'description' => 'Новости кино',
                'created_at' => now(),
            ],
            [
                'title' => 'Музыка',
                'description' => 'Новости музыка',
                'created_at' => now(),
            ],
            [
                'title' => 'Космос',
                'description' => 'Новости космос',
                'created_at' => now(),
            ],
            [
                'title' => 'Природа',
                'description' => 'Новости природа',
                'created_at' => now(),
            ],
            [
                'title' => 'Строительство',
                'description' => 'Новости строительство',
                'created_at' => now(),
            ],
            [
                'title' => 'Отдых',
                'description' => 'Новости отдых',
                'created_at' => now(),
            ],
            [
                'title' => 'Развлечения',
                'description' => 'Новости развлечения',
                'created_at' => now(),
            ],
        ];
        return $categories;
    }

}
