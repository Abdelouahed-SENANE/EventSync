<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(2),
            'image' => 'uploads/avatar.png',
            'date' => $this->faker->dateTime(),
            'venue' => $this->faker->address(),
            'number_of_seats' => $this->faker->randomNumber( 3 ),
            'price' => $this->faker->numberBetween(50 , 100),
            'validation_type' => '1',
            'status' => 'accepted',
            'user_id' => '2',
            'category_id' => '1',
        ];
    }
}
