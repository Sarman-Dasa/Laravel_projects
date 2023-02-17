<?php

namespace App\Http\Controllers;

use App\Jobs\SendVerifyMailJob;
use App\Mail\sendmyData;
use App\Models\PasswordReset;
// use App\Mail\verifyEmail;
use App\Models\User;
use App\Notifications\ForgotPassword;
use Exception;
use GuzzleHttp\Psr7\Message;
use App\Notifications\VeriFyEmail;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

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
        $domain = URL::to('/');
        $user = User::create($request->all());
        $user['email_verify_token'];
        $user['domain'] = $domain;
        $user->notify(new VeriFyEmail($user));
       // SendVerifyMailJob::dispatch($user)->delay(now()->addSeconds(2));
        return redirect()->route('success.msg')->with('success',"Registration SuccessFully,Check Your Mail Inbox. To send a Verify Email message");
    }

    public function verifyEmail($token)
    {
            $user = User::where('email_verify_token',$token)->first();
           // return $user;
            if($user)
            {
                // $user->update([
                //     'email_verified_at'=>now(),
                //     'status' => 1,
                //     'email_verify_token' => '',   
                // ]);
                $user->email_verified_at = now();
                $user->status = 1;
                $user->email_verify_token = "";
                $user->save();
                //return $user;
                return redirect()->route('success.msg')->with('success',"Email Verify Successfully");
            }
            else
            {
                return redirect()->route('error.msg')->with('error',"Your Mail Already Verify Your are eligible to login");
            }
    }

    public function login()
    {
        return view('emails.userLogin');
    }

    public function isValidUser(Request $request)
    {

        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password,'status' => 1])){
            return redirect()->route("main");
        } else {
            return redirect()->route('error.msg')->with('error', 'Invalid Email address or Password');
        }
    }
    public function logOut()
    {
        session()->flush();
        Auth::logout();
        return redirect("/");
    }

    public function forgotPasword()
    {
        return view("emails.forgotPassword");
    }

    public function checkValidEmail(Request $request)
    {
        $email = $request->email;
        $user = User::where('email',$email)->first();
        if($user)
        {
            $token = Str::random(64);
            $data1 = PasswordReset::updateOrCreate(
            ['email'=>$email],
            [
                'email'=>$email,
                'token'=>$token,
                'created_at'=>now()
            ]);
            $user['token'] = $token;
           $user->notify(new ForgotPassword($user));
           return redirect()->route('user.forgotpassword')->with('success',"Check your mail box!");
        }
        else
        {
            return redirect()->route('user.forgotpassword')->with('error',"Email Address can't match!!! try again");
        }
        
    }

    public function resetPasswordDataFill(Request $request){
        
        $resetData = PasswordReset::where('token',$request->token)->get();
        if(isset($request->token) && count($resetData) > 0){
            $data = User::where('email',$request->email)->first();
            $data['token'] = $request->token;
            return view('emails.newPasword',compact('data'));
        }
    }
    public function setNewPassword(Request $request)
    {
        $request->validate([
            'password'              => 'required|digits:8',
            'confirmPassword'      => 'required|same:password',
        ]);
        $token =  PasswordReset::where('token',$request->token)->get();
        if(count($token) > 0)
        {
            $user = User::where('email',$request->email);
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('user.login')->with('success','password reset successfully.');
        }
        else{
            return redirect()->route('user.resetPasword')->with('error','This password reset token is invalid');
        }
    }
}
