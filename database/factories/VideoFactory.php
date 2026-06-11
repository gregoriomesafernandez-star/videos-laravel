<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    public function definition(): array
    {
        $images = [
            'demo-image-1.jpg',
            'demo-image-2.jpg',
            'demo-image-3.jpg',
            'demo-image-4.jpg',
            'demo-image-5.jpg',
            'demo-image-6.jpg',
            'demo-image-7.jpg',
            'demo-image-8.jpg',
            'demo-image-9.jpg',
        ];

        $videos = [
            'demo-video-1.mp4',
            'demo-video-2.mp4',
        ];

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(),
            'status' => 'public',
            'image' => fake()->randomElement($images),
            'video_path' => fake()->randomElement($videos),
        ];
    }
}