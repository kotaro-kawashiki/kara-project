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
    	$events = Post::get();
    	$event_list = [];
    	foreach ($events as $key => $event) {
    		$event_list[] = Calendar::event(
                $event->restaurant,
                true,
                new \DateTime($event->went_at),
                new \DateTime($event->end_at.' +1 day')
            );
    	}
    	$calendar_details = Calendar::addEvents($event_list); 
 
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
