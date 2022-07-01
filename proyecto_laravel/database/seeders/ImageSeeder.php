<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::factory(25)->create()
            ->each(function ($image) {
                $randomTags = Tag::all()->random(rand(1, 6))->pluck('id');
                $image->tags()->attach($randomTags);
            });
    }
}
