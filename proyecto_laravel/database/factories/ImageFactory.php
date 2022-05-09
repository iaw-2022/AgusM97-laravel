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
        $image_file = file_get_contents(
            $this->faker->imageUrl(random_int(200, 1000), random_int(200, 1000))
        );
        $enc_data = base64_encode($image_file);
        return [
            'user_id' => User::all()->random(1)->pluck('id')->first(),
            'file' => $enc_data,
            'description' => $this->faker->paragraph(),
        ];
    }
}
