<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTraits;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ResponseTraits;

    //-------------//User Registration Function //-----------------//
    public function registerUser(Request $request)
    {
        $data = $request->all();
        $validation = validator($data,[
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed',
        ]);

        if($validation->fails()){
            //return response()->json(['status'=>false,'message'=>'Validation Error','Error'=>$validation->errors()],422);

            return $this->sendErrorResponse($validation);
        }
        else{
            $data['password'] = Hash::make($request->password);
            $user = User::create($data);
            $token = $user->createToken('API TOKEN')->plainTextToken;
            //return response()->json(['status'=>true,'message'=>'User Created Successfullly','token'=>$token]);
            return $this->sendSuccessResponse(200,"User Created Successfullly",$token);
            
            
        }
    }
    
    //-------------//User Login Function //-----------------//
    public function login(Request $request){
        try {
            $data = $request->all();
            $validation = validator($data,[
                'email'    => 'required|email',
                'password' => 'required'
            ]);

            if($validation->fails()){
                //return response()->json(['status'=>false,'message'=>'Validation Error','Error'=>$validation->errors()],422);
                return $this->sendErrorResponse($validation);
            }

            if(!Auth::attempt($request->only(['email','password']))){
                return response()->json(['status'=>false,'message'=>'Email & password does not match!!'],401);
            }

            $user = User::where('email',$request->email)->first();  
            $token = $user->createToken("API TOKEN")->plainTextToken;
            //return response()->json(['status'=>true,'message'=>"User Logged In Successfully.",'token'=>$token],200); 

            return $this->sendSuccessResponse(200,"User Logged In Successfully",$token);

        } catch (Exception $th) {
            //return response()->json(['status'=>false,'message'=>$th->getMessage()],500);
            return $this->sendExecptionMessage($th);
        }
    }  
    
     //-------------//User All Record Show Function //-----------------//
    public function index()
    {
        try {
            $data = User::all();
            //return response()->json(['status'=>true,'message'=>'Users data get successfully','data'=>$data],200);
            return $this->sendSuccessResponse(true,"Users data get successfully",$data);

        } catch (Exception $th) {
            //return response()->json(['status'=>false,'message'=>$th->getMessage()],500);
            return $this->sendExecptionMessage($th);
        }
    }

      //-------------//User Record Show Function //-----------------//
    public function show(User $user)
    {
        try {
            //return response()->json(['status'=>true,'message'=>'Users data get successfully','data'=>$user],200);
            return $this->sendSuccessResponse(200,"Users data get successfully",$user);

        } catch (Exception $th) {
            //return response()->json(['status'=>false,'message'=>$th->getMessage()],500);
            return $this->sendExecptionMessage($th);
        }
    }

      //-------------//User Data Update Function //-----------------//
    public function update(Request $request, User $user)
    {
       $validation = validator($request->all(),[
            'name'     => 'required|alpha',
            'email'    => 'email|unique:users',
            'password' => 'required|digits:8|confirmed',
       ]);

       if($validation->fails()){
           // return response()->json(['status'=>false,'message'=>'Validation Error','eror'=>$validation->errors()],422);
           return $this->sendErrorResponse($validation);
       }
       $request['password'] = Hash::make($request->password);
       $user->update($request->all());
       //return response()->json(['status'=>true,'message'=>'Users data Updated successfully'],200);
       return $this->sendSuccessResponse(200,"Users data Updated successfully",$user);
    }

    //-------------//User Data Delete Function //-----------------//
    public function destroy(User $user)
    {
        $user->delete();
        //return response()->json(['status'=>true,'message'=>'Users data Deleted successfully'],200);
        return $this->sendSuccessResponse(200,'Users data Deleted successfully');
    }
}
