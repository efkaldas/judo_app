@extends('layouts.app')

@section('content')
<h1>{{$event->name}}</h1>
<p><small>{{$event->place}}, {{$event->date}}</small></p>
<div class="float-right">
<a class="btn btn-primary btn-lg" href="/events/{{$event->id}}/competitors/{{$event->id}}" role="button">Dalyvių sąrašas</a>
</div>
    <div class="jumbotron">
        <h2>Varžybų aprašymas:</h2>
        <p>{{$event->description}}</p>
        <h2>Dalyvių registracija</h2>
        <p><small>Norėdami užregistruoti dalyvius spauskite ant grupės</small></p>
        @if ($event->groups != null)
        @foreach ($event->groups as $group)
        <a class="btn btn-primary btn-lg" href="/events/{{$event->id}}/groups/{{$group->id}}" role="button">{{$group->name}}</a>
        @endforeach             
        @else
            <p>Grupių nerasta</p>
        @endif     
    </div>


@endsection