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
    {!! Form::open(['action' => ['GroupsController@update', $group->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'Pavadinimas')}}
            {{Form::text('name', $group->name,['class' => 'form-control', 'placeholder' => 'Pavadinimas'])}}
        </div>
        <div class="form-group">
            {{Form::label('gender', 'Lytis')}}
            {{Form::select('gender',$ports['gender'],null,['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('year_from', 'Metai nuo')}}
            {{Form::text('year_from', $group->year_from,['class' => 'form-control', 'placeholder' => '0000/00/00'])}}
        </div>
        <div class="form-group">
            {{Form::label('year_to', 'Metai iki')}}
            {{Form::text('year_to', $group->year_to,['class' => 'form-control', 'placeholder' => '0000/00/00'])}}
        </div>
        <?php $a = 0;?>
        <div class="form-group">
            {{Form::label('', 'Kategorijos')}}<br>
            @foreach ($categories as $category)
                {{Form::label('category[]', $category->name), ($group->categories->where('name', $category->name)) ? $a = 1 : $a = 0}}
                {{Form::checkbox('category[]', $category->id)}}
            @endforeach
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Pridėti', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>

    
@endsection