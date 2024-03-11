<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
            'date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'place_available' => $this->faker->numberBetween(10, 100),
            'categorie_id' => $this->faker->numberBetween(1, 2),
            'localisation' => $this->faker->paragraph, 
             
        ];
    }
}
