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
<div class="container">
    <h1>Pridėti naują Įvykį</h1>
    {!! Form::open(['action' => 'EventsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'Pavadinimas')}}
            {{Form::text('name', '',['class' => 'form-control', 'placeholder' => 'Pavadinimas'])}}
        </div>
        <div class="form-group">
            {{Form::label('place', 'Varžybų vieta')}}
            {{Form::text('place', '',['class' => 'form-control', 'placeholder' => 'Vieta'])}}
        </div>
        <div class="form-group">
            {{Form::label('date', 'Data')}}
            {{Form::date('date', '',['class' => 'form-control', 'placeholder' => '0000/00/00'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Varžybų aprašas')}}
            {{Form::textarea('description', '',['class' => 'form-control', 'placeholder' => 'Aprašas'])}}
        </div>
        <div class="form-group">
            {{Form::label('', 'Kategorijos')}}<br>
            @foreach ($groups as $group)
                {{Form::label('group[]', $group->name)}}
                {{Form::checkbox('group[]', $group->id)}}
            @endforeach
        </div>
        {{Form::submit('Pridėti', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
    
@endsection