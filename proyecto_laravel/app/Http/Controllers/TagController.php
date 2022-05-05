<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function showAll()
    {
        return view('tags', [
            'tags' => Tag::orderBy('name', 'asc')->paginate(30)
        ]);
    }

    public function deleteTag($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect('/tags')->with('status', 'Tag "' . $tag->name . '" deleted successfully.');
    }

    public function addTag(Request $request)
    {
        $request->validate([
            'name' => 'unique:tags'
        ]);
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();
        return redirect('/tags')->with('status', 'Tag "' . $tag->name . '" created successfully.');
    }
}
