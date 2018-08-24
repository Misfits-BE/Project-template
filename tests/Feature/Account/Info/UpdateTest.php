<?php

namespace Tests\Feature\Account\Info;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\CreatesUser;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class UpdateTest
 *
 * The incorrectRole test can be deleted when the application
 * allows authentication from normal users and admin users.
 *
 * @package Tests\Feature\Account\Info
 */
class UpdateTest extends TestCase
{
    use RefreshDatabase, CreatesUser, WithFaker;

    /**
     * @test
     * @testdox Test if a unauthenticated user can't update account information.
     */
    public function unauthenticated(): void
    {
        //
    }

    public function success(): void
    {
        //
    }

    public function incorrectRole(): void
    {
        //
    }
}
