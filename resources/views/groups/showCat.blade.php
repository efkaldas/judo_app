@extends('layouts.app')

@section('content')
    <h1>Svorio kategorijos: {{$group->name}} informacija</h1>
    <p>{{$group->year_from}} - {{$group->year_to}}, {{$group->gender}}</p>
    <h3>Svorio kategorijos:</h3>
    @foreach ($group->categories as $cat)
        <p>{{$cat->name}}</p>
    @endforeach
    {!! Form::open(['action' => ['GroupsController@destroy', $group->event_id, $group->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
    {{Form::hidden('_method', 'DELETE')}}
    <a class="btn btn-success" href="/groups/{{$group->id}}/edit" role="button">Redaguoti</a>
    {{Form::submit('Trinti', ['class' => 'btn btn-danger'])}}
{!! Form::close() !!}   
@endsection