<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function index()
    {
       $data = User::withCount('image')->get();
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
        $image->move(public_path().$path,$imagename);
       // $image->move(storage_path().$path,$imagename);

        $userId = Auth::user()->id;
        Image::create([
            'subject'  => $subjectName,
            'image'    => $path.$imagename,
            'user_id'  => $userId
        ]);
        return redirect()->route('image.create');
    }

    public function show($id)
    {
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
}
