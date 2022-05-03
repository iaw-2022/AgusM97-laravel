<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\ImageController;

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

    public function deleteUser($username)
    {
        $user = User::firstWhere('username', $username);
        ImageController::deleteImagesByUser($user->id);
        $user->delete();
        return redirect('/users');
    }
}
