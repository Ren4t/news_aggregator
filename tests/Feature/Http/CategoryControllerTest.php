<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_News_List_Success(): void
    {
        $response = $this->get(route('news.category.show'));

        //$response->assertSeeText('Новости');
        $response->assertStatus(200);
    }
}
