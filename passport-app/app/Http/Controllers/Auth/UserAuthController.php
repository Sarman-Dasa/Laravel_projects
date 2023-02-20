<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {
       $data = $request->validate([
            'name'  => 'required',
            'email'   => 'required',
            'password'   => 'required',
        ]);

        $data['password'] = Hash::make($request->password);

      $user = User::create($data);

    $token = $user->createToken('myapp')->accessToken;
    return response()->json(['data'=>$data,'token'=>$token]);
    }

    public function login(Request $request)
    {

        $data 
        = $request->validate([
            'email'    => "required|email",
            'password' => "required",
        ]);

      
        if(!Auth::attempt($data))
        {
            return response()->json(['error'=>"User name Or Password Don't Match!!!"]);
        }
         /** @var \App\Models\MyUserModel $user **/
        $user = Auth::user();
       $token = $user->createToken("myapp")->accessToken;
        return response()->json(['data'=>$data,'token'=>$token]);
    }
}
