<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Calendar;

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
    	$posts = Post::get();
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
                             'color' => '#ff0000',
                             'url' => route('posts.show',$post->id),
                         ]
            );
    	}
    	$calendar_details = Calendar::addEvents($post_list); 
 
        $user = \Auth::user();
        $month = date("m");
        $posts = $user->posts()->whereMonth('went_at','=',$month)->paginate(10000);
        $total = 0;
                    foreach($posts as $post){
                    $total += $post->cost;
                    }
        
        return view('calendar',['calendar_details'=>$calendar_details,'total'=>$total]);
        
    }
}
