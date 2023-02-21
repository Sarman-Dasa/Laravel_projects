<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerUser(Request $request)
    {
        $data = $request->all();
        $validation = validator($data,[
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed',
        ]);

        if($validation->fails()){
            return response()->json(['status'=>false,'message'=>'Validation Error','Error'=>$validation->errors()],422);
        }
        else{
            $data['password'] = Hash::make($request->password);
            $user = User::create($data);
            $token = $user->createToken('API TOKEN')->plainTextToken;
            return response()->json(['status'=>true,'message'=>'User Created Successfullly','token'=>$token]);
            
        }
    }

    public function login(Request $request){
        try {
            $data = $request->all();
            $validation = validator($data,[
                'email'    => 'required|email',
                'password' => 'required'
            ]);

            if($validation->fails()){
                return response()->json(['status'=>false,'message'=>'Validation Error','Error'=>$validation->errors()],422);
            }

            // if(!Auth::attempt(['email'=>$request->email,"password"=>$request->password])){
            //     return response()->json(['status'=>false,'message'=>'Email & password does not match!!'],401);
            // }

            if(!Auth::attempt($request->only(['email','password']))){
                return response()->json(['status'=>false,'message'=>'Email & password does not match!!'],401);
            }


            $user = User::where('email',$request->email)->first();  
            $token = $user->createToken("API TOKEN")->plainTextToken;
            return response()->json(['status'=>true,'message'=>"User Logged In Successfully.",'token'=>$token],200);    

        } catch (Exception $th) {
            return response()->json(['status'=>false,'message'=>$th->getMessage()],500);
        }
    }  
    
    public function index()
    {
        try {
            $data = User::all();
            return response()->json(['status'=>true,'message'=>'Users data get successfully','data'=>$data],200);
        } catch (Exception $th) {
            return response()->json(['status'=>false,'message'=>$th->getMessage()],500);
        }
    }

    public function show(User $user)
    {
        $user;
        try {
            return response()->json(['status'=>true,'message'=>'Users data get successfully','data'=>$user],200);
        } catch (Exception $th) {
            return response()->json(['status'=>false,'message'=>$th->getMessage()],500);
        }
    }

    public function update(Request $request, User $user)
    {
       $validation = validator($request->all(),[
            'name'     => 'required|alpha',
            'email'    => 'email|unique:users',
            'password' => 'required|digits:8|confirmed',
       ]);

       if($validation->fails()){
            return response()->json(['status'=>false,'message'=>'Validation Error','eror'=>$validation->errors()],422);
       }
       $request['password'] = Hash::make($request->password);
       $user->update($request->all());
       return response()->json(['status'=>true,'message'=>'Users data Updated successfully'],200);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['status'=>true,'message'=>'Users data Deleted successfully'],200);
    }
}
