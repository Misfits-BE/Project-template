<?php

namespace Tests\Feature\Welcome;

use Tests\CreatesUser;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class AdminTest
 *
 * @package Tests\Feature\Welcome
 */
class AdminTest extends TestCase
{
    use RefreshDatabase, CreatesUser;

    /**
     * @test
     * @testdox Test the error response when the user is not authenticated
     */
    public function unautenticated(): void
    {
        $this->get(route('home'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    /**
     * @test
     * @testdox Test the error response when the user has normal user permissions.
     */
    public function normalUser(): void
    {
        $this->actingAs($this->createUser('user'))
            ->get(route('home'))
            ->assertStatus(403);
    }

    /**
     * @test
     * @testdox Test that an active admin user can view the page without errors
     */
    public function activeUser(): void
    {
        $this->actingAs($this->createUser('admin'))
            ->get(route('home'))
            ->assertStatus(200);
    }
}
