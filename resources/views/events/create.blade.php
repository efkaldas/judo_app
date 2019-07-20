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
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
         @enderror
        </div>
        <div class="form-group">
            {{Form::label('place', 'Varžybų vieta')}}
            {{Form::text('place', '',['class' => 'form-control', 'placeholder' => 'Vieta'])}}
            @error('place')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
         @enderror
        </div>
        <div class="form-group">
            {{Form::label('date', 'Data')}}
            {{Form::date('date', '',['class' => 'form-control', 'placeholder' => '0000/00/00'])}}
            @error('date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
         @enderror
        </div>
        <div class="form-group">
            <div class="row">
                <div class="column" style="margin-left: 15px">
                    {{Form::label('registration_start_date', 'Registracijos pradžia')}}
                    {{Form::date('registration_start_date', '',['class' => 'form-control', 'placeholder' => '0000/00/00'])}}
                    @error('registration_start_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
                </div>
                <div class="column" style="margin-left: 35px">
                    {{Form::label('registration_start_time', 'laikas')}}
                    {{Form::time('registration_start_time', '',['class' => 'form-control', 'placeholder' => '0000/00/00'])}}
                    @error('registration_start_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
                 </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="column" style="margin-left: 15px">
                    {{Form::label('registration_end_date', 'Registracijos pabaiga')}}
                    {{Form::date('registration_end_date', '',['class' => 'form-control', 'placeholder' => '0000/00/00'])}}
                    @error('registration_end_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
                </div>
                <div class="column" style="margin-left: 35px">
                    {{Form::label('registration_end_time', 'laikas')}}
                    {{Form::time('registration_end_time', '',['class' => 'form-control', 'placeholder' => '0000/00/00'])}}
                    @error('registration_end_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
                 </div>
            </div>
        </div>
        <div class="form-group">
            {{Form::label('description', 'Varžybų aprašas')}}
            {{Form::textarea('description', '',['class' => 'form-control', 'placeholder' => 'Aprašas'])}}
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
         @enderror
        </div>
        {{Form::submit('Pridėti', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
    
@endsection