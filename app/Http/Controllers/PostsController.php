<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use DB;
use App\Post;
use Auth;
use App\People;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
//   post.timeline
    public function index()
    {
        //検索ボックスに入力された値
        $query = request()->s;  
        $query2 = request()->h;
        $message = 1;
        
        $user = Auth::user();
        if(!empty($query)){
            if(is_string($query))
            {
                $data = DB::table('posts')->select('id','user_id','restaurant','cost','went_at','pic_url','comments','category')
                                      ->where([['restaurant','LIKE',"%$query%"],['user_id',$user->id]])
                                      ->orWhere([['comments','LIKE',"%$query%"],['user_id',$user->id]])
                                      ->paginate(10);
            }                        
            // var_dumps($data);
            // exit;
            if(is_numeric($query))
            {
                $data = DB::table('posts')->select('id','user_id','restaurant','cost','went_at','pic_url','category','comments')                              
                                      ->orWhere([['cost',$query],['user_id',$user->id]])                      
                                      ->paginate(10);
            }
        }
        elseif(!empty($query2)){
            $data = DB::table('people')->where('people_name','LIKE',"%$query2%")
                                       ->join('posts','people.post_id','=','posts.id')
                                       ->where('posts.user_id',"$user->id")
                                       ->orderBy('posts.went_at','desc')
                                       ->paginate(10);
                                    // var_dump($data);
                                    // exit;
        }
        else{
            $data = DB::table('posts')->where('user_id',"$user->id")->orderBy('went_at','desc')->paginate(1000);
            if(count($data)==0){
                $message = 0;
            }
        }
        
        return view('post.timeline',['data' => $data,'query' => $query,'query2'=>$query2,'message'=>$message]);
    }

//   post.post
    public function create()
    {
        $post = new Post;
        $people = new People;
        return view('post.post',['post' => $post,'people'=>$people]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'restaurant' => 'required|max:191',
            'cost' => 'required|max:7',
            'went_at' => 'required',
            'pic_url' => 'required|max:191',
            'category' => 'required'
            
            ]);
            
        $post = $request->user()->posts()->create([
            'restaurant' => $request->restaurant,
            'cost' => $request->cost,
            'went_at' => $request->went_at,
            'end_at' => $request->went_at,
            'comments' => $request->comments,
            'pic_url' => $request->pic_url,
            'category' => $request->category,
            ]);
        
        //こんな感じでいけるかも？
        
        foreach($request->people_name as $value){
            if(!is_null($value)){
                $post->people()->create([
                     'people_name' => $value,
                ]);
            }
        }
       
    //   var_dump($post);
    //   exit;
       
        return redirect('/calendar');
    }

// post.show as detail
    public function show($id)
    {
        if(Post::find($id)){
            $post = Post::find($id);
            if($post->category=="#aae"){
                $category="会社";
            }
            elseif($post->category=="#bea"){
                $category="友達";
            }
            elseif($post->category=="#aee"){
                $category="家族";
            }
            else{
                $category="そのほか";
            }
            $people = People::all();
            return view('post.detail',['post'=>$post, 'people'=>$people, 'category'=>$category]);
        }else{
            return redirect('post.timeline');
        }
        
    }

// post.edit
    public function edit($id)
    {
        $post = Post::find($id);
        // 違う不具合が出るので元に戻しました
        $people = DB::table('people')->where('post_id',$post->id)->pluck('people_name');
  
        if(\Auth::user()->id == $post->user_id){
            return view('post.edit',['post' => $post,'people'=>$people]);
        }
        else {
            return redirect('/');
        }
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'restaurant' => 'required|max:191',
            'cost' => 'required|max:7',
            'went_at' => 'required',
            'pic_url' => 'required|max:191',
            'category' => 'required',
            
            ]);
            
            $post = Post::find($id);
            $post->restaurant = $request->restaurant;
            $post->cost= $request->cost;
            $post->went_at = $request->went_at;
            $post->end_at = $request->went_at;
            $post->comments = $request->comments;
            $post->pic_url = $request->pic_url;
            $post->category = $request->category;
            $post->save();
            
            
            $post->people()->delete();
            if(!is_null($request->people_name)){
                foreach($request->people_name as $value){
                $post->people()->create([
                     'people_name' => $value,
                ]);
                }
            }
            
            return redirect('/calendar');
    }


    public function destroy($id)
    {
        $post = \App\Post::find($id);

        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }

        return redirect('/calendar');
    }
    
    
}
