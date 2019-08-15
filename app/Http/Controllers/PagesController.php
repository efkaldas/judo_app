<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use App\Group;

class PagesController extends Controller
{
    public function index() {
        $event = Event::orderBy('date', 'desc')->paginate(7);
        $skaičius = 0;
        return view('pages.home')->with('events', $event);
    }
    public function about() {
        return view('pages.about');
    }
}
