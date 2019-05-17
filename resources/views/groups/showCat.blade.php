@extends('layouts.app')

@section('content')
    <h1>Svorio kategorijos: {{$group->name}} informacija</h1>
    <p>{{$group->year_from}} - {{$group->year_to}}, {{$group->gender}}</p>
    <h3>Svorio kategorijos:</h3>
    @foreach ($group->categories as $cat)
        <p>{{$cat->name}}</p>
    @endforeach
@endsection