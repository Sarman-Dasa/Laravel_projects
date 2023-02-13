<?php

namespace App\Http\Controllers;

use App\Mail\sendmyData;
// use App\Mail\verifyEmail;
use App\Models\User;
use Exception;
use GuzzleHttp\Psr7\Message;
use App\Notifications\VeriFyEmail;
use Illuminate\Http\Request;
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
        $request['email_verify_token']=Str::random(15);
        $user = User::create($request->all());
        
        $user->notify(new VeriFyEmail($user));
        
        //send Mail To user
        // try {
        //     Mail::to($request->email)->send(new verifyEmail());
        //     return "Thanks for signing up! Before getting started, could you verify \n
        //     your email address by clicking on the\n
        //     link we just emailed to you?";
        // } catch (Exception $th) {
        //     return "Some Error".$th;
        // }
       // return redirect()->route("");
    }

    public function login()
    {
        return view('emails.userLogin');
    }
}
