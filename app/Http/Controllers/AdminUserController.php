<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;

class AdminUserController extends Controller
{
    public function showAllUsers()
    {
        $users = User::all();
        return view('adminUser.showAllUsers', ['users' => $users]);
    }

    public function deleteUser($id)
    {
        Comment::where('user_id', $id)->delete();
        User::find($id)->delete();
        return redirect()->route('users');
    }

    public function changeRole($id)
    {
        $user = User::find($id);
        $user->roles_id = 1;
        $user->save();
        return redirect()->route('users');
    }
}
