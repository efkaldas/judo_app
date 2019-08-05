@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="/images/avatars/{{$user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ $user->club }}</h2>
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Pakeisti klubo ikoną</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" value="patvirtinti" class="pull-right btn btn-sm btn-primary">
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>Trenerio vardas ir pavardė: {{$user->firstname}} {{$user->lastname}}</h3>
            <h3>Šalis: {{$user->country}}</h3>
            <h3>Miestas: {{$user->city}}</h3>
        </div>
    </div>
</div>
@endsection