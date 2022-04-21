<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function showAll()
    {
        return view('images', [
            'images' => Image::all()
        ]);
    }
}
