<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class CalendarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $month = date("m");
        $posts = $user->posts()->whereMonth('went_at','=',$month)->paginate(10000);
        
        return view('calendar',['posts'=>$posts]);
        
    }
}
