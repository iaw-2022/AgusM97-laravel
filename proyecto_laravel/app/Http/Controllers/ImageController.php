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

    public function showImage($id)
    {
        return view('image', [
            'image' => Image::find($id)
        ]);
    }

    public function deleteImage($id)
    {
        $image = Image::find($id);
        $image->delete();
        return redirect('/images')->with('status', 'Image #' . $image->id . ' deleted successfully');
    }

    public static function deleteImagesByUser($userId)
    {
        Image::where('user_id', $userId)->delete();
    }
}
