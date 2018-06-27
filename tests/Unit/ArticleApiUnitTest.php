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
            ->assertStatus(201)
            ->assertJson($data);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testEditArticle()
    {
        // setup
        $article = factory(Article::class)->create();

        //exercise
        $response = $this->get(route('articles.edit', $article->id));

        // verify
        $response->assertStatus(201);
        $response->assertJson(['status' => true]);
        $response->assertJson(['message' => "Article Created!"]);
        $response->assertJson(
            ['data' => [
                'title' => $article->title,
                'content' => $article->content
            ]]
        );
        $response->assertJsonStructure(['data' => ['id', 'title', 'content']]);
    }
}
