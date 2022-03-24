<?php

namespace Tests\Feature;

use App\Models\Aircraft;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class AircraftTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Aircraft::factory()->create([
            'name' => 'Cessna',
            'max_duration' => 120,
            'price_per_hour' => 10000,
        ]);

        Aircraft::factory()->create([
            'name' => 'Piper',
            'max_duration' => 60,
            'price_per_hour' => 20000,
        ]);
    }

    public function test_visitors_can_view_the_aircraft_page(): void
    {
        $response = $this->get('/aircraft');

        $response
            ->assertOk()
            ->assertInertia(
                fn (Assert $page) => $page
                    ->component('Aircraft/Index')
                    ->has('aircraft', 2)
                    ->has(
                        'aircraft.0',
                        fn (Assert $assert) => $assert
                            ->where('id', 1)
                            ->where('name', 'Cessna')
                            ->where('price', 10000)
                            ->where('max_duration', '2h')
                    )
                    ->has(
                        'aircraft.1',
                        fn (Assert $assert) => $assert
                            ->where('id', 2)
                            ->where('name', 'Piper')
                            ->where('price', 20000)
                            ->where('max_duration', '1h')
                    )
            );
    }

    public function test_can_search_aircraft_by_name(): void
    {
        $this->get('/aircraft?search=Cessna')
            ->assertInertia(
                fn (Assert $assert) => $assert
                ->component('Aircraft/Index')
                ->where('filters.search', 'Cessna')
                ->has('aircraft', 1)
                ->has(
                    'aircraft.0',
                    fn (Assert $assert) => $assert
                    ->where('id', 1)
                    ->where('name', 'Cessna')
                    ->where('price', 10000)
                    ->where('max_duration', '2h')
                )
            );
    }
}
