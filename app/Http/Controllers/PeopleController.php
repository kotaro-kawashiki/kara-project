<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

use App\People;

class PeopleController extends Controller
{
    
    public function index()
    {
        $user = Auth::user()->id;
        $people = DB::table('people')->select('post_id','people_name')
                                     ->join('posts','post_id','=','posts.id')
                                     ->where('user_id',$user)
                                     ->get();
        $names = [];
        foreach($people as $person){
            if(!is_null($person->people_name)){
                array_push($names,$person->people_name);
            }
        }
            
                                     
        // var_dump($names);
        // exit;
                                     
        $count = array_count_values($names);
        // var_dump($count);
        // exit;
        
        $names = array_unique($names);
        
        return view('post.friendslist',['names'=>$names,'count'=>$count]);
    }
    
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'people_name' => 'required|max:191',
            
            ]);
        
        $request->post()->people()->create([
            'people_name' => $request->people_name,
        ]);
        
        return redirect('/calendar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'people_name' => 'required|max:191',
            ]);
            
            $people = People::find($id);
            $people->people_name = $request->people_name;
            
            $post->save();
            
            return redirect('/calendar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
