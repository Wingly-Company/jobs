<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class WelcomeTest extends TestCase
{
    public function test_visitors_can_view_the_welcome_page(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertInertia(
                fn (Assert $page) => $page->component('Welcome')
            );
    }
}
