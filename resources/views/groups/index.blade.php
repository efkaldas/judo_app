@extends('layouts.app')

@section('content')
    <h1>Amžiaus grupės</h1>
    <div class="text-right">
        <a class="btn btn-dark btn-lg pull-right" href="groups/create" role="button">Kurti naują grupę</a>
    </div><br>
    @foreach ($groups as $group)
    <div class="card mb-1">
        <h2><a href="/groupsInfo/{{$group->id}}">{{$group->name}}</a></h2>
    </div>      
    @endforeach

@endsection