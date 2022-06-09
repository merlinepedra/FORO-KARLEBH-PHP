<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        [
            //This order is important
            \App\Models\Profile::factory(10)->create(),
            \App\Models\Category::factory(10)->create(),
            \App\Models\Post::factory(10)->create(),
            \App\Models\Comment::factory(10)->create(),
        ];
    }
}
