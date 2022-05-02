<?php

namespace App\Http\Controllers;

use App\Models\Image;

class ImageController extends Controller
{
    public function showAll()
    {
        return view('images', [
            'images' => Image::paginate(7)
        ]);
    }

    public static function deleteImagesByUser($userId)
    {
        Image::where('user_id', $userId)->delete();
    }
}
