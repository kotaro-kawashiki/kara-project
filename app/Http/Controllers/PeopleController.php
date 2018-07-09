<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;

class PeopleController extends Controller
{
    
    public function index()
    {
        $key='people_name';
        $peoples = array(People::all());
        
        
        $peoples2 = array_unique($peoples);
        
        return view('post.friends',[$key,'peoples2' => $peoples2]);
        
    }
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
