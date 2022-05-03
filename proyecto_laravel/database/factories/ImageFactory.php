<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image_link = file_get_contents($this->faker->imageUrl());
        $enc_data = base64_encode($image_link);
        return [
            'user_id' => User::factory(),
            'file' => $enc_data,
            'description' => $this->faker->paragraph(),
        ];
    }
}
