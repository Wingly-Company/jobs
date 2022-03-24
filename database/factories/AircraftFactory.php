<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aircraft>
 */
class AircraftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement([
                'Piper',
                'Cessna',
                'Tiger',
                'Traveller',
                'Cheetah',
                'SportCruiser',
                'Citabria',
                'Super Decathlon',
                'Super Emeraude',
                'Dove',
                'Savage',
            ]),
            'seats' => $this->faker->randomElement([2, 4, 6, 8, 10]),
            'price_per_hour' => $this->faker->randomElement([5000, 10000, 15000, 17000, 20000]),
            'max_duration' => $this->faker->randomElement([30, 60, 90, 120, 150, 180]),
        ];
    }
}
