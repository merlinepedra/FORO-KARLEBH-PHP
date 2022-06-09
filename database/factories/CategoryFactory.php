<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::first();

        return [
            'user_id' => $user->id,
            'name' => $this->faker->word,
            'views' => $this->faker->unique()->randomNumber()
        ];
    }
}
