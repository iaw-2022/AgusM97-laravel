<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showAll()
    {
        return view('users', [
            'users' => DB::table('users')->paginate(15)
        ]);
    }
}
