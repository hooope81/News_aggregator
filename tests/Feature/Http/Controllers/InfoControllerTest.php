<?php

namespace tests\Feature\Http\Controllers;

use Tests\TestCase;

class InfoControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testInfoSuccessStatus(): void
    {
        $response = $this->get(route('info'));

        $response->assertStatus(200);
    }

    public function testInfoCreateUserFormSuccessStatus(): void
    {
        $response = $this->get(route('createUserForm'));

        $response->assertStatus(200);
    }

    public function testStoreOrderForm()
    {
        $response = $this->get(route('storeOrderForm'));
        $value = 'name';
        $response->assertSeeText($value);
    }

    public function testStoreUserForm()
    {
        $response = $this->get(route('storeOrderForm'));
        $value = 'login';
        $response->assertSeeText($value);
    }

}

