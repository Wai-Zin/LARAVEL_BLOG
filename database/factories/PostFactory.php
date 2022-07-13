<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'title' => 'My Title from Factory',
            // 'body' => 'My Title from Factory'
            'title' => $this->faker->text(10),
            'body' => $this->faker->text(100),
            'user_id'=> 1,

        ];
    }
}
