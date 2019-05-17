@extends('layouts.app')

@section('content')
    <h1>Varžybų sąrašas</h1>
    @if (auth()->user()->admin)
    <div class="text-right">
        <a class="btn btn-dark btn-lg pull-right" href="events/create" role="button">Kurti naujas varžybas</a>
    </div><br>
    @endif
    @if (count($events) > 0)

        @foreach ($events as $event)
          <div class="card p-3 mb-2">
           <h3><a href="/events/{{$event->id}}">{{$event->name}}</a></h3>
           <p><small>{{$event->place}}, {{$event->date}}</small><p>
          </div>

        @endforeach

    @else
        <p>Varžybų nerasta</p>
    @endif
@endsection