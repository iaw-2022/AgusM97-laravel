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

    public function showUser($username)
    {
        return view('user', [
            'user' => User::firstWhere('username', $username)
        ]);
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        return redirect('/users');
    }
}
