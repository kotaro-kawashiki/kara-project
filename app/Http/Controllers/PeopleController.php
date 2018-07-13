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
        $user_id = Auth::user()->id;
        $people = DB::table('people')->select('people.post_id','people.people_name')
                                     ->join('posts','people.post_id','=','posts.id')
                                     ->where('posts.user_id',$user_id)
                                     ->select('people.post_id','people.people_name','posts.restaurant')
                                     ->get();
                    // var_dump($people);
                    // exit;
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
        // var_dump($names);
        // exit;
        
        return view('people.friendslist',['names'=>$names,'count'=>$count]);
    }
    
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        
        
        $user_id = Auth::user()->id;
        $person_infos = DB::table('people')->where('people_name',$name)
                                     ->join('posts','people.post_id','=','posts.id')
                                     ->where('posts.user_id',$user_id)
                                     ->select('people.people_name','posts.restaurant')
                                     ->get();
                                     
        // var_dump($person_infos);
        // exit;
        
        $name = [];
        foreach($person_infos as $person_info){
            array_push($name,$person_info->people_name);
        }
        
        
        $restaurants = [];
        foreach($person_infos as $person_info){
            array_push($restaurants,$person_info->restaurant);
        }        
        
        // var_dump($info);
        // exit;
        
        $data = [
            'restaurants' => $restaurants,
            'name' => $name
            ];
                                     
        return view('people.people',$data);
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
