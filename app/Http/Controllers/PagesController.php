<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use App\Group;

class PagesController extends Controller
{
    public function index() {
        $event = Event::all();
        $group = Group::all();
        $skaičius = 0;
        return view('pages.home')->with(['events' => $event, 'groups' => $group]);
    }
    public function about() {
        return view('pages.about');
    }
}
