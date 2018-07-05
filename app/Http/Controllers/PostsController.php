<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
//   post.timeline
    public function index()
    {
        $posts = Post::all();
        
        return view('post.timeline',['posts' => $posts]);
    }

//   post.post
    public function create()
    {
        $post=new Post;
        return view('post.post',['post' => $post]);
        
    }

// when you create some posts you can set this route
    public function store(Request $request)
    {
        $this->validate($request,[
            'restaurant' => 'required|max:191',
            'cost' => 'required|max:7',
            'friends' => 'required|max:191',
            'went_at' => 'required',
            ]);
            
        $request->user()->posts()->create([
            'restaurant' => $request->restaurant,
            'cost' => $request->cost,
            'friends' => $request->friends,
            'went_at' => $request->went_at,
        ]);
        
        return redirect('/');
    }

// post.show as detail
    public function show($id)
    {
        //
    }

// post.edit
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $post = \App\Post::find($id);

        if (\Auth::id() === $post->userid) {
            $post->delete();
        }

        return redirect()->back();
    }
}
