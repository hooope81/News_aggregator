<?php

namespace tests\Feature\Http\Controllers;

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


}
