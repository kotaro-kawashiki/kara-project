<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Calendar;
use Auth;

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

   
    public function index()
    {
        // this is the calendar function
    	$user = Auth::user();
        $posts = $user->posts()->paginate(50);
    	$post_list = [];
    	foreach ($posts as $key => $post) {
    		$post_list[] = Calendar::event(
                $post->restaurant,
                true,
                new \DateTime($post->went_at),
                new \DateTime($post->end_at.' +1 day'),
                null,
                            // Add color and link on event
                         [
                             'color' => "$post->category",
                             'url' => route('posts.show',$post->id),
                         ]
            );
    	}
    	$calendar_details = Calendar::addEvents($post_list); 
        // this shows the total amount of each month
        $month = date("m");
        $posts = $user->posts()->whereMonth('went_at','=',$month)->orderBy('went_at','asc')->paginate(10000);
        $total = 0;
                    foreach($posts as $post){
                    $total += $post->cost;
                    }
        
        return view('calendar',['calendar_details'=>$calendar_details,'total'=>$total,'posts' => $posts]);
        
    }
}
