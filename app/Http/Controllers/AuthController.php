<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');

    }




    public function registerPost(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
            'toc' => 'required',
        ]);



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        \Log::info('User registered successfully', ['user_info' => $user]);




        if(!$user){
            return redirect()->back()->with('error', "Registeration failed, try again");
        };


        Auth::login($user);// Data is stored in the session and the user's cookie is also stored
        $request->session()->regenerate();
        return redirect()->route('home')->with('success', "Registeration success, loign to access the app");
    }


    public function login()
    {

        if(auth()->check()){
            return redirect()->route('home');
        };
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {


        $infoValidate = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:5',

        ]);


        \Log::info('validate info ', ['info', $infoValidate]);



        $user = User::where('email',$request->email )->first();

        if(!$user){
            return redirect()->back()->with('error', 'The selected email is invalid.');
        }



        if(!Hash::check($request->password, $user->password)){
            return  redirect()->back()->with('error', 'The Password entered is Wrong');
        }


        // auth()->login() // helper function


        Auth::login($user);// Data is stored in the session and the user's cookie is also stored
        $request->session()->regenerate();
        return redirect()->route('home')->with('success', 'success login to account');

    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

}


