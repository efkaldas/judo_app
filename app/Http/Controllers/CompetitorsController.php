<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Competitor;
use App\Category;
use App\User;
use App\Event;
use App\Judoka;
use Excel;
use App\Exports\CompetitorsExport;


class CompetitorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request, $event, $group, $judoka)
    {
        $competitor = new Competitor;
        $competitor->judoka_id = $judoka;
        $competitor->category_id = $request->input('category');
        $competitor->group_id = $group;

        $competitor->save();

        return redirect('/events/'.$event.'/groups/'.$group)->with('success', 'Sportininkas sėkmingai užregistruotas!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($event,$id)
    {
        $eventt = Event::find($event);
        $competitors = Competitor::all();
        $judokas = Judoka::all();

        return view('competitors.show')->with(['event'=>$eventt, 'competitors'=>$competitors, 'judokas'=>$judokas]);
    }
    function excel($id)
    {
        return Excel::download(new CompetitorsExport($id), 'users.xlsx');
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
    public function destroy($a, $b, $id)
    {
        $competitor = Competitor::find($id);
        $competitor->delete();

        return redirect()->back()->with('success', 'Sportininko registrcija pašalinta');
    }
}
