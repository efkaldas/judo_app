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
    <h1>Pridėti naują Grupę</h1>
    {!! Form::open(['action' => ['GroupsController@store', $event->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'Pavadinimas')}}
            {{Form::text('name', '',['class' => 'form-control', 'placeholder' => 'Pavadinimas'])}}
        </div>
        <div class="form-group">
            {{Form::label('gender', 'Lytis')}}
            {{Form::select('gender',$ports['gender'],null,['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            <div class="row">
                <div class="column" style="margin-left: 15px">
                    {{Form::label('year_from', 'Metai nuo')}}
                    {{Form::text('year_from', '',['class' => 'form-control', 'placeholder' => '0000/00/00'])}}
                </div>
                <div class="column" style="margin-left: 15px">
                    {{Form::label('year_to', 'Metai iki')}}
                    {{Form::text('year_to', '',['class' => 'form-control', 'placeholder' => '0000/00/00'])}}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="column" style="margin-left: 15px">
                    {{Form::label('start_date', 'Varžybų data')}}
                    {{Form::date('start_date', '',['class' => 'form-control', 'placeholder' => '0000/00/00'])}}
                </div>
                <div class="column" style="margin-left: 35px">
                    {{Form::label('start_time', 'laikas')}}
                    {{Form::time('start_time', '',['class' => 'form-control', 'placeholder' => '0000/00/00'])}}
                 </div>
            </div>
        </div>
        <div class="form-group">
            {{Form::label('weight_date', 'Svėrimo data')}}
            {{Form::date('weight_date', '',['class' => 'form-control', 'placeholder' => '0000/00/00'])}}
        </div>
        <div class="form-group">
            <div class="row">
                <div class="column" style="margin-left: 15px">
                    {{Form::label('weight_time_from', 'Svėrimo pradžia')}}
                    {{Form::time('weight_time_from', '',['class' => 'form-control', 'placeholder' => '0000/00/00'])}}
                </div>
                <div class="column" style="margin-left: 35px">
                    {{Form::label('weight_time_to', 'Svėrimo pabaiga')}}
                    {{Form::time('weight_time_to', '',['class' => 'form-control', 'placeholder' => '0000/00/00'])}}
                 </div>
            </div>
        </div>
        <div class="form-group">
            {{Form::label('', 'Kategorijos')}}<br>
            @foreach ($categories as $category)
                {{Form::label('category[]', $category->name)}}
                {{Form::checkbox('category[]', $category->id)}}
            @endforeach
        </div>
        {{Form::submit('Pridėti', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>

    
@endsection