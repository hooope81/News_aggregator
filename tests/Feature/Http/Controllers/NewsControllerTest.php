<?php

namespace tests\Feature\Http\Controllers;

use App\Models\News;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus(): void
    {
        $response = $this->get(route('news'));

        $response->assertStatus(200);
    }

    public function testCreateSaveSuccessData(): void
    {
        $news = News::factory()->definition();

        $response = $this->post(route('admin.news.store'), $news);

        $response->assertStatus(200);
    }
}
