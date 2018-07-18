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
        
        $names = array_unique($names);
        
        $people_info = [];
        foreach($names as $name){
            $restaurants = [];
            $person_info = [ 'name' => $name,];
                    
            foreach($people as $person)
                if($person_info['name'] == $person->people_name){
                    
                    $restaurants[] = $person->restaurant;
                }
                
            $count = count($restaurants);
            
            $person_info += ['restaurants' => $restaurants,
                             'count' => $count,
                             ];
                   
            $people_info[] = $person_info;
        }
        // var_dump($people_info);
        // exit;
        
        return view('people.friendslist',['people_info' => $people_info]);
    }
    
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show($name)
    {
        
        $user_id = Auth::user()->id;
        $person_infos = DB::table('people')->where('people_name',$name)
                                     ->join('posts','people.post_id','=','posts.id')
                                     ->where('posts.user_id',$user_id)
                                     ->select('people.people_name','posts.restaurant','posts.went_at','posts.cost','posts.id','posts.pic_url')
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
        
        $pic_url = [];
        foreach($person_infos as $person_info){
            array_push($pic_url,$person_info->pic_url);
        }  
        
        // var_dump($name);
        // exit;
        
        $data = [
            'restaurants' => $restaurants,
            'name' => $name,
            'pic_url' => $pic_url,
            'person_infos' => $person_infos,
            
            ];
            
        // var_dump($data);
        // exit;
                                     
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
