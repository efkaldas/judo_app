<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Judoka;
use App\User;

class JudokasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id)->judokas()->orderBy('lastname', 'asc')->paginate(7);
        return view('judokas.index')->with('judokas', $user);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $array = array(
            'years' => [null => 'pasirinkite metus', '1990' => '1990', '1991' => '1991', '1992' => '1992', '1993' => '1993', '1994' => '1994',
            '1995' => '1995', '1996' => '1996', '1997' => '1997', '1999' => '1999', '2000' => '2000', '2001' => '2001',
            '2002' => '2002', '2003' => '2003', '2004' => '2004', '2005' => '2005', '2006' => '2006', '2007' => '2007',
            '2008' => '2008', '2009' => '2009', '2010' => '2010', '2011' => '2011' ],
            'gender' => [null => 'pasirinkite lytį', 'vyras' => 'vyras', 'moteris' => 'moteris']
        );
        return view('judokas.create')->with('ports', $array);
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
            'lastname' => 'required',
            'firstname' => 'required',
            'birthyear' => 'required',
            'gender' => 'required'
        ]);
        $judoka = new Judoka;
        $judoka->lastname = $request->input('lastname');
        $judoka->firstname = $request->input('firstname');
        $judoka->birthyear = $request->input('birthyear');
        $judoka->gender = $request->input('gender');
        $judoka->user_id = auth()->user()->id;
        $judoka->save();

        return redirect('/judokas')->with('success', 'Sportininkas pridėtas!');
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
        $judoka = Judoka::find($id);
        $array = array(
            'years' => [$judoka->birthyear => $judoka->birthyear, '1990' => '1990', '1991' => '1991', '1992' => '1992', '1993' => '1993', '1994' => '1994',
            '1995' => '1995', '1996' => '1996', '1997' => '1997', '1999' => '1999', '2000' => '2000', '2001' => '2001',
            '2002' => '2002', '2003' => '2003', '2004' => '2004', '2005' => '2005', '2006' => '2006', '2007' => '2007',
            '2008' => '2008', '2009' => '2009', '2010' => '2010', '2011' => '2011' ],
            'gender' => [$judoka->gender => $judoka->gender, 'vyras' => 'vyras', 'moteris' => 'moteris']
        );
        if(auth()->user->id !== $judoka->user_id) {
            return redirect('home')->with('error', 'Pirmiausia prisijunkite');
        }

        return view('judokas.edit')->with(['judoka' => $judoka, 'ports' => $array]);
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
        $this->validate($request, [
            'lastname' => 'required',
            'firstname' => 'required',
            'birthyear' => 'required',
            'gender' => 'required'
        ]);
        $judoka = Judoka::find($id);
        $judoka->lastname = $request->input('lastname');
        $judoka->firstname = $request->input('firstname');
        $judoka->birthyear = $request->input('birthyear');
        $judoka->gender = $request->input('gender');
        $judoka->save();

        return redirect('/judokas')->with('success', 'Sportininko informacija sėkmingai pakeista!');
    }
    public function approval()
    {
    return view('includes.approval');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $judoka = Judoka::find($id);
        $judoka->delete();

        return redirect()->back()->with('success', 'Sportininkas pašalintas');
    }
}
