<?php

namespace App\Http\Controllers;

use App\Models\Singer;
use App\Models\SingerSong;
use App\Models\Song;
use Illuminate\Http\Request;

class SingerController extends Controller
{
    public function create()
    {
        return view('singerSong.addSingers');
    }

    public function store(Request $req)
    {
       $singer = new Singer();
       $singer->name = $req->name;
       $singer->save();
       $singer->songs()->attach($req->songid);
       return redirect()->route('showSinger');
    }

    public function show()
    {
        $data = Singer::withCount('songs')->get();
        $songname = Song::all();
        //return $data;
        return view('singerSong.showSingersData',compact('data','songname'));
    }

    public function showSinger($id)
    {
        $data = Song::find($id)->singers;
       // $songname = Song::all();
        return view('singerSong.showSingersData',compact('data','songname'));
    }
}
