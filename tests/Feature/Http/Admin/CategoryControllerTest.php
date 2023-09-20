<?php

namespace Tests\Feature\Http\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
   public function test_Category_List_Success(): void
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertSeeText('Список категорий');
        $response->assertStatus(200);
    }
    
    public function test_Category_Create_Success(): void
    {
        $response = $this->get(route('admin.categories.create'));

        $response->assertSeeText('Добавить категорию');
        $response->assertStatus(200);
    }
}

