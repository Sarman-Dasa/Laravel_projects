<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use App\Traits\UploadFileTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class ImageController extends Controller
{
    use UploadFileTrait;

    public function index()
    {
        $data = "";
        if(Auth::user()->role != "Teacher")
        {
            $id = Auth::user()->id;
            $data = User::withCount('image')->find($id);
            //return $data;
        }
        else{
            $data = User::withCount('image')->get();
        }
       //$data = User::all();
       //return $data;
       return view('FileStorge.displayData',compact('data'));
    }

    public function create()
    {
        return view('FileStorge.uploadImage');
    }

    public function store(Request $request)
    {
      
       $request->validate([
            'subject'  => 'required',
            'image'    => 'required|image|mimes:png,jpg,jpeg',
       ]);
       //return $request;
        $subjectName = $request->subject;
        $image       = $request->file("image");
        $imagename   = $image->getClientOriginalName();
        $userName    = Auth::user()->name;
        $path ='/storage/Assignments/'.$userName.'/'.$subjectName.'/';
       // $this->imageUpload($image,$path);
        $image->move(public_path().$path,$imagename);

        $userId = Auth::user()->id;
        Image::create([
            'subject'  => $subjectName,
            'image'    => $path.$imagename,
            'user_id'  => $userId
        ]);
        return redirect()->route('image.index');
    }

    public function show($id)
    {
        if(Auth::user()->role != "Teacher")
        {
            $id = Auth::user()->id;
        }
        $data = user::with('image')->find($id);
       return view('FileStorge.userImageDataShow',compact('data'));
    }
    public function imageDownload(Request $req)
    {
        $downloadImage = public_path().$req->path;
        return response()->download($downloadImage);
    }

    public function imageDelete($id)
    {
        $data = Image::find($id);
        $imagePath = public_path().$data->image;

        unlink($imagePath);
        // Storage::delete($image);
         $data->delete();
        return redirect()->route('image.index');
    }

    public function showAllImage()
    {
        $file = Storage::allFiles('public');
        $imageFile = str_replace("public","/storage",$file);
        return view("FileStorge.showAllFile",compact('imageFile'));
    }
    
    public function status($id)
    {
       $user = User::find($id);

       $status = $user->status == 1 ? 0 : 1;
       $user->status = $status;
       $user->save();
       return redirect()->route('success.msg')->with('success',"user " .$user->name." login status has been chnage.");
    }
}
