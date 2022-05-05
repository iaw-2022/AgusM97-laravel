<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->username == $username)
            return redirect()->back()->with('errors', ['Can\'t delete active user.']);
        $user = User::firstWhere('username', $username);
        ImageController::deleteImagesByUser($user->id);
        $user->delete();
        return redirect('/users')->with('status', 'User "' . $user->username . '" deleted successfully.');
    }

    public function updateUser(Request $request, $username)
    {
        $request->validate([
            'email' => 'unique:users'
        ]);

        $user = User::firstWhere('username', $username);
        $user->email = $request->input('email');
        $user->bio = $request->input('bio');
        $user->update();
        return redirect()->back()->with('status', 'User Updated Successfully');
    }
}
