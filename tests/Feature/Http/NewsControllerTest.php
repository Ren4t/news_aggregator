<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
     public function test_News_List_Success(): void
    {
        $response = $this->get(route('news.index'));

        $response->assertSeeText('Новости');
        $response->assertStatus(200);
    }
     public function test_One_News_Success(): void
    {
        $response = $this->get(route('news.index'));

       // $response->assertSeeText('Новости');
        $response->assertStatus(200);
    }
}
