<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Category;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        return view('groups.index')->with('groups', $groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $array = array(
            'gender' => [null => 'pasirinkite lytį', 'vyras' => 'vyras', 'moteris' => 'moteris']
        );

        $categories = Category::all();
        return view('groups.create')->with(['categories'=> $categories, 'ports'=> $array]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'year_from' => 'required',
            'year_to' => 'required',
            'category' => 'required'
        ]);
    //    $checked = in_array($category->id, $checkeds) ? true : false;
        $group = new Group;
        $group->name = $request->input('name');
        $group->gender = $request->input('gender');
        $group->year_from = $request->input('year_from');
        $group->year_to = $request->input('year_to');
        //$group->categories()->sync(Input::get('category'));
        $a=$request->input('category');
        $cat = Category::find($a);
        $group->save();
        $group->categories()->attach($cat);
      //  $group->categories()->attach([5,3]);
      //  $group->categories()->sync(array(1 => array('id' => true)));


        $group->save();

       // $kategory = Kategory::find(1);
      //  $group->kategories()->attach($kategory);
    //    $category = Category::find(1);
     //   $group->categories()->attach($category);
        
     return redirect('/groups')->with('success', 'Grupė sėkmingai sukurta!');
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
        //
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
