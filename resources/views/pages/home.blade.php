@extends('layouts.app')

@section('content')
@guest
    <div class="jumbotron text-center">
        <h1>Sveiki atvykę į dziudo registracijos sitemą</h1>
        <p>Tam, kad naudotis sitemą, pirmiausia turite prisijungti.</p>
        <p><a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Prisijungti</a> <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">Registruotis</a></p>
    </div>
        <h1>Varžybų sąrašas</h1>
    @if (count($events) > 0)

        @foreach ($events as $event)
          <div class="card p-3 mb-2">
              <div class="row">
                  <div class="col">
                    <h3><a href="/events/{{$event->id}}">{{$event->name}}</a></h3>
                  </div>
                  <div class="col">
                  <p align="right">Dalyvių skaičius: {{count($event->competitors)}}</p>
                  </div>
              </div>
           <p><small>{{$event->place}}, {{$event->date}}</small><p>
                @if ($event->groups) 
                @foreach ($event->groups as $group)
                <a class="btn btn-primary btn-lg" href="/events/{{$event->id}}/groupsInfo/{{$group->id}}" role="button">{{$group->name}}</a>
                @endforeach           
                @else
                <p>Grupių nerasta</p> 
                @endif
          </div>

        @endforeach

    @else
        <p>Varžybų nerasta</p>
    @endif
@endguest
@endsection