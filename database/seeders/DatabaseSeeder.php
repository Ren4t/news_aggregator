<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
               // CategorySeeder::class,
              //  NewsSeeder::class, // сиды добавить в массив, 
                //php artisan migrate --seed будет вызван сразу для всех сидов
                UserSeeder::class,
        ]);
         
    }
}
