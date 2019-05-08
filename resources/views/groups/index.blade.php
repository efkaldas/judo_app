@extends('layouts.app')

@section('content')
    <h1>Mano sportininkai</h1>
    @foreach ($groups as $group)
    @foreach ($group->categories as $cat)

<p>{{$cat}}</p>

    <p></p>
        
    @endforeach
        @endforeach

@endsection