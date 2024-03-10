<?php

namespace Database\Factories;

use App\Models\User;
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
        $users = User::all();
        foreach ($users as $user) {
            return [
                //
                'title' => $this->faker->sentence(2),
                'description' => $this->faker->paragraph(2),
                'image' => 'uploads/avatar.png',
                'date' => $this->faker->dateTime(now()),
                'venue' => $this->faker->city(),
                'number_of_seats' => 50,
                'price' => $this->faker->numberBetween(50 , 100),
                'remaining_seats' => 50,
                'validation_type' => '1',
                'status' => 'accepted',
                'user_id' => $user->id,
                'category_id' => '1',
            ];
        }
        return [
            //
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->paragraph(2),
            'image' => 'uploads/avatar.png',
            'date' => $this->faker->dateTime(now()),
            'venue' => $this->faker->city(),
            'number_of_seats' => 50,
            'price' => $this->faker->numberBetween(50 , 100),
            'remaining_seats' => 50,
            'validation_type' => '1',
            'status' => 'accepted',
            'user_id' => '1',
            'category_id' => '1',
        ];
    }
}
