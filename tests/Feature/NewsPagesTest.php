<?php

namespace Tests\Feature;

use App\News;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsPagesTest extends TestCase
{
    use RefreshDatabase;

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
        $news = factory(News::class)->create(['id' => 2]);

        $this->get(route('news.show', $news))->assertStatus(200); // Found
        $this->get(route('news.show', ['id' => 4646]))->assertStatus(404); // Not Found
    }

    /**
     * @covers \App\Http\Controllers\NewsController::search()
     */
    public function testSearchPageFeature()
    {
        $this->get(route('news.search'))
            ->assertStatus(302);
    }

    /**
     * @covers \App\Http\Controllers\NewsController::create()
     */
    public function testCreatePage()
    {
        $admin = $this->createAdmin();
        $user  = $this->createUser();

        $this->actingAs($admin) // Authorized access with an admin account.
            ->assertAuthenticatedAs($admin)
            ->get(route('news.create'))
            ->assertStatus(200);

        $this->actingAs($user) // Access test as normal user.
            ->assertAuthenticatedAs($user)
            ->get(route('news.create'))
            ->assertStatus(403);

        auth()->logout();

        // Test unauthenticated access
        $this->get(route('news.create'))->assertRedirect('/login');
    }
}
