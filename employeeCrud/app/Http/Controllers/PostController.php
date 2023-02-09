<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function addPost()
    {
        $post = new Post();
        $post->title = "fourth Post";
        $post->body = "this is five post";
        $post->save();

        // $post = Post::create([
        //     'title'=>'first post',
        //     'body'=>'this is first post'
        // ]);
        
       $post->comments()->create([
            'body'=>'this five post comment'
       ]);
    }

    public function showPost($id)
    {
        $post = Post::find($id);
         return $post->comments;
    }
}
