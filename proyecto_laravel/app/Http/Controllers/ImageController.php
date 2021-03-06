<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

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

    public function addImage(Request $request, $username)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,png'
        ]);

        $request->image->store('upload', 'public');
        $image = new Image;
        $image->user_id = UserController::getIdByUsername($username);
        $image->description = $request->description;
        $image->file = base64_encode(file_get_contents($request->image->path()));
        $image->save();
        return redirect('/image/' . $image->id)->with('status', 'Image uploaded successfully.');
    }
}
