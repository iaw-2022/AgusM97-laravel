<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function showAll()
    {
        return view('users', [
            'users' => User::paginate(15)
        ]);
    }
}
