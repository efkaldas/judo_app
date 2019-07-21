<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Group;
use App\Category;
use App\User;
use App\Event;
use App\Judoka;
use App\Competitor;
use PDF;

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
    public function create($event)
    {
        $event = Event::find($event);
        $array = array(
            'gender' => [null => 'pasirinkite lytį', 'vyras' => 'vyras', 'moteris' => 'moteris']
        );

        $categories = Category::all();
        return view('groups.create')->with(['event'=> $event,'categories'=> $categories, 'ports'=> $array]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $event)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'year_from' => 'required',
            'year_to' => 'required',
            'category' => 'required'
        ]);
        $group = new Group;
        $group->name = $request->input('name');
        $group->gender = $request->input('gender');
        $group->year_from = $request->input('year_from');
        $group->year_to = $request->input('year_to');
        $a=$request->input('category');
        $group->event_id = $event;
        $cat = Category::find($a);
        $group->save();
        $group->categories()->attach($cat);


        $group->save();

        
     return redirect('/events')->with('success', 'Grupė sėkmingai sukurta!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $group)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id)->judokas();
        $event = Event::find($id);
        $groups = $event->groups()->find($group);
        $list = $groups->categories->pluck('name','id');
        $judokas = $user->where('gender', '=', $groups->gender)->where('birthyear', '<=', $groups->year_to)
        ->where('birthyear', '>=', $groups->year_from)->orderBy('lastname', 'asc')->paginate(7);
        $categories = $groups->categories;
        return view('groups.show')->with(['judokas' => $judokas, 'group' => $groups, 'ports' => $list, 'event' => $event,
        'categories' => $categories]);
    }
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCat($id)
    {
        $group = Group::find($id);
        return view('groups.showCat')->with('group', $group);
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
    public function update(Request $request, $id, $group, $judoka)
    {
        $event = Event::find($id);
        $groups = Group::find($group);
        $category = $request->input('category');
        $categoryf = $groups->categories()->find($category);
        $judokas = Judoka::find($judoka);
        $categoryf->judokas()->attach($categoryf->id, ['category_id' => $categoryf->id,
        'judoka_id' => $judokas->id]); 
      //  $categoryf->judokas()->sync($judokas);
       // $event->$groups->$categoryf;


       // $event->groups()->categories()->attach($judokas);

        return redirect('/events/'.$id.'/groups/'.$group)->with('success', 'Sportininkas sėkmingai užregistruotas!');
    }
    public function printPDF($event_id, $group_id, $competitor_id) {
        $competitor = Competitor::find($competitor_id);   
        $event = Event::find($event_id);  
        $group = Group::find($group_id);    
        $data = ['test'];
        $pdf = PDF::loadView('competitors.printPDF', compact('competitor', 'event', 'group'));
        return $pdf->download('dalyvis'. $competitor_id.'pdf');
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
