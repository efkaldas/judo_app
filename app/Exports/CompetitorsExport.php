<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Judoka;
use App\Event;
use App\Route;

class CompetitorsExport implements FromCollection
{
    private $id;
    public function __construct($id) 
    {
        $this->id = $id;
    } 
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $competitors_array[] = array('lastname', 'firstname', 'year', 'club', 'country', 'city', 'category', 'sex');
        $event = Event::find($this->id);
        foreach ($event->groups as $group) {
            foreach($group->competitors as $competitor) {
                 $competitors_array[] = array(
                'lastname'  => $competitor->judokas->firstname,
                'firstname'   => $competitor->judokas->lastname,
                'year'   => $competitor->judokas->birthyear,
                'club'    => $competitor->judokas->user->club,
                'country'    => $competitor->judokas->user->country,
                'city'    => $competitor->judokas->user->city,
                'category'    => $competitor->categories->name,
                'sex'    => $competitor->judokas->gender
               );
        }
    }


        return collect($competitors_array);
    }
}
