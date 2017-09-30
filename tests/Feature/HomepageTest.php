<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomepageTest extends TestCase
{
    /**
     * @test
     * @testdox Test the home page for the application.
     */
    public function testHomePage()
    {
        $this->get('/')->assertStatus(200);
    }
}
