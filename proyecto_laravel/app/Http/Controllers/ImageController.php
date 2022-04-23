<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function showAll()
    {
        return view('images', [
            'images' => DB::table('images')->paginate(7)
        ]);
    }
}
