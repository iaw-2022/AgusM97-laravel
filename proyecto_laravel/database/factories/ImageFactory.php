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

        $enc_data = base64_encode(
            file_get_contents("https://picsum.photos/" . random_int(200, 1000) . "/" . random_int(200, 1000))
        );
        return [
            'user_id' => User::all()->random(1)->pluck('id')->first(),
            'file' => $enc_data,
            'description' => $this->faker->paragraph(),
        ];
    }
}
