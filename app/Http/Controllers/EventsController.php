<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Group;
use App\Category;



class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        return view('events.create')->with('groups', $groups);       
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
            'place' => 'required',
            'date' => 'required',
            'description' => 'required',
            'group' => 'required'
        ]);
        $event = new Event;
        $event->name = $request->input('name');
        $event->place = $request->input('place');
        $event->date = $request->input('date');
        $event->description = $request->input('description');
        $a=$request->input('group');
        $cat = Group::find($a);
        $event->save();
        $event->groups()->attach($cat);


        $event->save();

        
     return redirect('/events')->with('success', 'Grupė sėkmingai sukurta!');
    }

    public function get_export()
    {
        $table = Cpmreport::all();
        $file = fopen('Output.csv', 'w');
        foreach ($table as $row) {
            fputcsv($file, $row->to_array());
        }
        fclose($file);
        return Redirect::to('consolidated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('events.show')->with('event', $event);
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