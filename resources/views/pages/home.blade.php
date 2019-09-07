@extends('layouts.app')

@section('content')
@guest
    <div class="jumbotron text-center">
        <h1>{{ __('words.welcome') }}</h1>
        <p>{{ __('words.welcom_description') }}</p>
        <p><a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">{{ __('words.log_in') }}</a> <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">{{ __('words.register') }}</a></p>
    </div>
        <h1>{{ __('words.events_list') }}</h1>
    @if (count($events) > 0)

        @foreach ($events as $event)
          <div class="card p-3 mb-2">
              <div class="row">
                  <div class="col">
                    <h3><a href="/events/{{$event->id}}">{{$event->name}}</a></h3>
                  </div>
                  <div class="col">
                  <p align="right">{{ __('words.competitros_count') }}: {{count($event->competitors)}}</p>
                  </div>
              </div>
           <p><small>{{$event->place}}, {{$event->date}}</small><p>
            @if (now() < $event->registration_start)
                <p class="text-danger">{{ __('words.registration_start') }}: {{ chop($event->registration_start, ":00") }}</p>           
            @else
                <p class="text-danger">{{ __('words.registration_end') }}: {{ chop($event->registration_end, ":00") }}</p> 
            @endif
          </div>

        @endforeach

    @else
        <p>Varžybų nerasta</p>
    @endif
@endguest
@endsection