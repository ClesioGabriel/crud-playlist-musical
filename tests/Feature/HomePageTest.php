<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    /** @test */
    public function home_page_should_return_success_status()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
