<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


class ForgetPasswordController extends Controller
{
    //


    public function forgetPassword()
    {

        if(auth()->check()){
            return redirect()->route('home');
        };
        return view('auth.reset-password');
    }


    public function forgetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        // DB::table('password_reset_tokens')->where('email', 'daryoushjamshidi8080@gmail.com')->delete();
        // DB::table('password_reset_tokens')->where('email', 'daryoushjamshidi80@gmail.com')->delete();

        $email = DB::table('password_reset_tokens')->where('email', $request->email)->first();
        if($email){
            return redirect()->back()->with('error', 'Password forgotten email has already been send');
        }

        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::Now(),
        ]);

        

        try{
            $mail= Mail::send('emails.forget-password', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('reset password');
            });
        }catch (\Exception $e){
            \Log::error('erorr send image', ['error' => $e]);
        }
        return redirect()->route('forgetPasword')->with('success', 'The email was sent successfully');
    }



    public function resetPassword($token)
    {
        

        return view('auth.password-reset', ['token' => $token]);

    }



    public function resetPasswordPost(Request $request)
    {
        
        

        $request->validate([
            'password' => 'required|min:5|confirmed',
            'recode' => 'required',
        ]); 

        $updatePassword = DB::table('password_reset_tokens')->where([
            'token' => $request->token,
        ])->first();

        if(!$updatePassword){
            return redirect()->back()->with(['error' => 'Invalid data']);
        };


        $user = User::where('email', $updatePassword->email);

        $user->update([
            'password' =>  Hash::make($request->password),
        ]);

        // $updatePassword->delete();
        DB::table('password_reset_tokens')->where([
            'token' => $request->token,
        ])->delete();
        return redirect()->route('login');



    }
}
