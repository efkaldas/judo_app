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
    <h1>Pridėti naują sportininką</h1>
    {!! Form::open(['action' => 'JudokasController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('lastname', 'Pavardė')}}
            {{Form::text('lastname', '',['class' => 'form-control', 'placeholder' => 'Pavardė'])}}
        </div>
        <div class="form-group">
            {{Form::label('firstname', 'Vardas')}}
            {{Form::text('firstname', '',['class' => 'form-control', 'placeholder' => 'Vardas'])}}
        </div>
        <div class="form-group">
            {{Form::label('birthyear', 'Gimimo metai')}}
            {{Form::select('birthyear',$ports['years'],null,['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('gender', 'Lytis')}}
            {{Form::select('gender',$ports['gender'],null,['class' => 'form-control'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
    
@endsection