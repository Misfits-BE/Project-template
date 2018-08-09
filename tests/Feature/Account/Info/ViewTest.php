<?php

namespace Tests\Feature\Account\Info;

use Tests\CreatesUser;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class ViewTest
 *
 * The incorrectRole test can be deleted when the application
 * allows authentication from normal users and admin users.
 *
 * @package Tests\Feature\Account\Info
 */
class ViewTest extends TestCase
{
    use RefreshDatabase, CreatesUser;

    /**
     * @test
     * @testdox Test that quest user can't access the view.
     */
    public function unacuthenticated(): void
    {
        $this->get(route('account.info'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    /**
     * @test
     * @testdox Test if a authenticated user with the correct ACL role can view the page.
     */
    public function success(): void
    {
        $this->actingAs($this->createUser('admin'))
            ->get(route('account.info'))
            ->assertStatus(200);
    }

    /**
     * @test
     * @testdox Test if a user with incorrect ACL role can't access the view.
     */
    public function incorrectRole(): void
    {
        $this->actingAs($this->createUser('user'))
            ->get(route('account.info'))
            ->assertStatus(403);
    }
}
