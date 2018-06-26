<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Article;

class ArticleApiUnitTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateArticle()
    {
        $data = [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph
        ];

        $this->post(route('articles.store'), $data)
            ->dump()
            ->assertStatus(201)
            ->assertJson($data);
    }
}
