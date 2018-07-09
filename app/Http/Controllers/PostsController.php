<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\People;

class PostsController extends Controller
{
//   post.timeline
    public function index()
    {
        $posts = Post::all();
        $peoples=People::all();
        return view('post.timeline',['posts' => $posts,'peoples' => $peoples]);
    }

//   post.post
    public function create()
    {
        $post=new Post;
        $people=new People;
        return view('post.post',['post' => $post,'people'=>$people]);
        
    }

// when you create some posts you can set this route
    public function store(Request $request)
    {
        $this->validate($request,[
            'restaurant' => 'required|max:191',
            'cost' => 'required|max:7',
            'went_at' => 'required',
            'people_name' => 'required|max:191',
            
            ]);
            
        $post = $request->user()->posts()->create([
            'restaurant' => $request->restaurant,
            'cost' => $request->cost,
            'went_at' => $request->went_at,
            'comments' => $request->comments,
        ]);
        
        //こんな感じでいけるかも？
        $post->people()->create([
             'people_name' => $request->people_name,
        ]);
        // $request->user()->posts()->people()->create([
        //     'people_name' => $request->people_name,
        // ]);

        return redirect('/calendar');
    }

// post.show as detail
    public function show($id)
    {
        //
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
            'went_at' => 'required',
            'peoplr_name' => 'required|max:191',
            
            ]);
            
            $post = Post::find($id);
            $post->restaurant = $request->restaurant;
            $post->cost= $request->cost;
            $post->went_at = $request->went_at;
            $post->comments = $request->comments;
            $post->save();
            
            $people = People::find($id);
            $people->people_name = $request->people_name;
            $people->save();
            
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
