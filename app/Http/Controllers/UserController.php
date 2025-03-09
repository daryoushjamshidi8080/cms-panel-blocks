<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;


class UserController extends Controller
{
    //

    public function manage()
    {
        $user = auth()->user();
        if(!$user->getRoleNames()->contains('admin')){
            return view('panel.dashboard', ['user' => $user]);
        };
        $users = User::all();

        return view('panel.user-manage', compact('users'));
    }

    public function managePost(Request $request)
    {

        $user = User::where('id', $request->userId);
        $users = User::all();

        $posts = Post::where('user_id', $request->userId)->with(['gallery', 'category'])->paginate(5);
        $thisUser= auth()->user();
        session()->put('posts', $posts);
        return view('panel.dashboard', ['user' => $thisUser]);
    }
}
