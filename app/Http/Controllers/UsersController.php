<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;

class UsersController extends Controller
{
    public function favos($id)
    {
        $user = User::find($id);
        $favos = $user->favos()->paginate(10);

        $data = [
            'user' => $user,
            'posts' => $favos,
        ];

        $data += $this->counts($user);

        return view('post.favolist',$data);
    }
}
