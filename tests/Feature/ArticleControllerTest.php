<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase;
    
    public function testIndex()
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('articles.index'));

        $response->assertStatus(302)
            ->assertViewIs('articles.index');
    }
}
