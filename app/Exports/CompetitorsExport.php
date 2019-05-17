<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Judoka;
use App\Event;

class CompetitorsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $competitors_array[] = array('lastname', 'firstname', 'klub', 'category', 'year');
        $event = Event::find("1");
        foreach ($event->judokas as $judoka) {
            $competitors_array[] = array(
                'lastname'  => $judoka->lastname,
                'firstname'   => $judoka->firstname,
                'klub'    => $judoka->user->club,
                'category'  => $judoka->categories()->get(),
                'year'   => $judoka->birthyear
               );
        }


        return collect($competitors_array);
    }
}
