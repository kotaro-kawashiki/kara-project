<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Like;
use App\Post;
use Auth;
use App\People;

class LikesController extends Controller
{
    public function store(Request $request, $postId)
    {
        Like::create(
          array(
            'user_id' => Auth::user()->id,
            'post_id' => $postId
          )
        );

        $post = Post::findOrFail($postId);

        return redirect()->back();
    }

    public function destroy($postId, $likeId) {
      $post = Post::findOrFail($postId);
      $post->like_by()->findOrFail($likeId)->delete();

      return redirect()->back();
    }
    
}
