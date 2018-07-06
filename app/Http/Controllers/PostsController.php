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
            'end_at' => $request->went_at,
            'comments' => $request->comments,
        ]);
        
        return redirect('/calendar');
    }

// post.show as detail
    public function show($id)
    {
        $post = Post::find($id);
        
        return view('post.detail',['post'=>$post]);
    }

// post.edit
    public function edit($id)
    {
        $post = Post::find($id);
        
        return view('post.edit',['post' => $post]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'restaurant' => 'required|max:191',
            'cost' => 'required|max:7',
            'friends' => 'required|max:191',
            'went_at' => 'required',
            
            ]);
            
            $post = Post::find($id);
            $post->restaurant = $request->restaurant;
            $post->cost= $request->cost;
            $post->friends = $request->friends;
            $post->went_at = $request->went_at;
            $post->comments = $request->comments;
            $post->save();
            
            return redirect('/calendar');
    }


    public function destroy($id)
    {
        $post = \App\Post::find($id);

        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }

        return redirect()->back();
    }
}
