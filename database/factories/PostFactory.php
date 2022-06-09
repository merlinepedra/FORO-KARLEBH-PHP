<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Database\Factories\UserFactory;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(30);
        $slug = Str::limit(Str::slug($title), 50, '');
        $user = User::first();

        return [
            'user_id' => $user->id,
            'category_id' => Category::first()->id,
            'title' => $title,
            'views' => 100,
            'slug' => $slug,
            'desc' => $this->faker->text,
            'sort_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
