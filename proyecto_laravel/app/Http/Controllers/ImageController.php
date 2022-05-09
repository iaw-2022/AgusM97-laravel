<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

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

    public function updateImage(Request $request, $id)
    {
        $image = Image::find($id);
        $image->description = $request->input('description');
        $image->update();
        return redirect()->back()->with('status', 'Image Updated Successfully');
    }

    public static function deleteImagesByUser($userId)
    {
        Image::where('user_id', $userId)->delete();
    }
}
