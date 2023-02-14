<?php

namespace App\Http\Controllers;

use App\Mail\sendmyData;
// use App\Mail\verifyEmail;
use App\Models\User;
use Exception;
use GuzzleHttp\Psr7\Message;
use App\Notifications\VeriFyEmail;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
class emailController extends Controller
{
    public function sendEmail()
    {
        $data = [
            'subject' => "Email Send Example",
            'body' => "This email send Via Controller",
            'dob' => "This email send Via Controller",
        ];
        try {
           Mail::to('hello@example.com')->send(new sendmyData($data));
           return response()->json(['great check your mail box']);
        } catch (Exception $th) {
            return response()->json(['sorry some Error...'.$th]);
        }
    }
    public function create()
    {
        return view('emails.userRegistration');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha',
            'email' => 'required|email|unique:users',
            'password' =>'required|digits:8',
            'confirmPassword' =>'required|same:password'
        ]);
        $request['password'] = Hash::make($request->password);
        $request['email_verify_token'] = Str::random(64);
        $user = User::create($request->all());
        $user['email_verify_token'];
        $user->notify(new VeriFyEmail($user));
    }

    public function verifyEmail($token)
    {
       // return $token ?? "Not Work";
      
            //session()->forget('token');
            $user = User::where('email_verify_token',$token);
           // return $user;
            $user->update([
                'email_verified_at'=>now(),
                'status' => 1,
                'email_verify_token' => '',    
            ]);
            //return Auth::user()->name;
            return redirect()->route('user.login');  
    }

    public function login()
    {
        return view('emails.userLogin');
    }

    public function isValidUser(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect("employee");
        } else {
            return redirect('/login')->with('error', 'Invalid Email address or Password');
        }
    }

    public function logOut()
    {
        session()->flush();
        Auth::logout();
        return redirect("/");
    }
}
