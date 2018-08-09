<?php

namespace Tests\Feature\Welcome;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class GuestTest
 *
 * @package Tests\Feature\Welcome
 */
class GuestTest extends TestCase
{
    /**
     * @test
     * @testdox Test if a quest user can view the welcome route without problems.
     */
    public function frontend(): void
    {
        $this->get(route('welcome'))->assertStatus(200);
    }
}
