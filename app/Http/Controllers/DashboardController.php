<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Spatie\Permission\Models\Role;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //




    public function dashboard()
    {


        $userID = auth()->user()->id;
        // dd($userID);
        $posts = Post::where('user_id', $userID)->with(['gallery', 'category'])->paginate(5);
        $user = auth()->user();
        // dd($user);
        session()->put('posts', $posts);
        return view('panel.dashboard', ['user'=> $user]);
    }

}
