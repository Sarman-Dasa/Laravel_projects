<?php

namespace App\Http\Controllers;

use App\Models\Singer;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
   public function create()
   {
    return view('singerSong.addSongs');
   }

   public function store(Request $req)
   {
       $song = new Song();
       $song->title = $req->title;
       $song->save();
       return redirect()->route('showsong');
   }
   public function show()
   {
        $data = Song::all();
        return view('singerSong.showSongData',compact('data'));
   }

   public function showSong($id)
   {
        $data = Singer::find($id)->songs;
        return view('singerSong.showSongData',compact('data'));
   }

}
