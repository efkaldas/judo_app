@extends('layouts.app')

@section('content')
<div class="text-right">
        <button onclick="goBack()"class="btn btn-light border">Atgal</button>
    <script>
            function goBack() {
              window.history.back();
            }
            </script>
</div>
<h1>{{$event->name}}</h1>
<p><small>{{$event->place}}, {{$event->date}}</small></p>
<div class="float-right">
<a class="btn btn-primary btn-lg" href="/events/{{$event->id}}/competitors/{{$event->id}}" role="button">Dalyvių sąrašas</a>
</div>
    <div class="jumbotron">
        <h2>Varžybų aprašymas:</h2>
        <p><?php echo nl2br($event->description)?></p>
        <h2>Dalyvių registracija</h2>
        @if (now() < $event->registration_start)
            <p>Registracijos pradžia: {{ chop($event->registration_start, ":00") }}</p>           
        @else
            <p>Registracijos pabaiga: {{ chop($event->registration_end, ":00") }}</p> 
        @endif
        <p><small>Norėdami užregistruoti dalyvius spauskite ant grupės</small></p>
        @if ($event->groups != null)
        @if (now() < $event->registration_start)
        <p class="text-danger">Registracija dar neprasidėjo!</p>
            @foreach ($event->groups as $group)
                <a class="btn btn-primary btn-lg disabled" href="/events/{{$event->id}}/groups/{{$group->id}}" aria-disabled="true" role="button">{{$group->name}}</a>
            @endforeach   
        @elseif(now() > $event->registration_end) 
        <p class="text-danger">Registracija baigėsi!</p>
        @foreach ($event->groups as $group)
            <a class="btn btn-primary btn-lg disabled" href="/events/{{$event->id}}/groups/{{$group->id}}" aria-disabled="true" role="button">{{$group->name}}</a>
        @endforeach
        @else
        @foreach ($event->groups as $group)
        <a class="btn btn-primary btn-lg" href="/events/{{$event->id}}/groups/{{$group->id}}" role="button">{{$group->name}}</a>
        @endforeach 
        @endif      
        @else
            <p>Grupių nerasta</p>
        @endif    
    </div>


@endsection