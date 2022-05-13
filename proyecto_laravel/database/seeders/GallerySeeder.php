<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;
use App\Models\Image;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gallery::factory(10)->create()
            ->each(function ($gallery) {
                $randomImages = Image::all()->random(rand(1, 6))->pluck('id');
                $gallery->images()->attach($randomImages);
            });
    }
}
