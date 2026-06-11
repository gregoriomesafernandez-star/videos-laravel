<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,

            'video_id' => Video::inRandomOrder()->first()->id,

            'body' => fake()->sentence(12),
        ];
    }
}