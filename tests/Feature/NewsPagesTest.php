<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsPagesTest extends TestCase
{
    /**
     * @covers \App\Http\Controllers\NewsController::index()
     */
    public function testIndexPage()
    {
        $this->get(route('news.index'))->assertStatus(200);
    }

    /**
     * @covers \App\Http\Controllers\NewsController::show()
     */
    public function testShowPage()
    {
        //
    }
}
