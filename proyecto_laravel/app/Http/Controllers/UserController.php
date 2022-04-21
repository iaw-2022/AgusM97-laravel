<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class UserController extends Controller
{
    public function showAll()
    {
        return view('users', [
            'users' => User::all()
        ]);
    }
}
