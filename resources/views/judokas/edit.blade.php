@extends('layouts.app')

@section('content')
<div class="text-right">
        <button onclick="goBack()"class="btn btn-light border">{{__('words.back')}}</button>
    <script>
            function goBack() {
              window.history.back();
            }
            </script>
</div>
<div class="container">
    <h1>{{__('words.edit_judoka')}}</h1>
    {!! Form::open(['action' => ['JudokasController@update', $judoka->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('lastname', __('words.lastname'))}}
            {{Form::text('lastname', $judoka->lastname, ['class' => 'form-control', 'placeholder' => __('words.lastname')])}}
        </div>
        <div class="form-group">
            {{Form::label('firstname', __('words.firstname'))}}
            {{Form::text('firstname', $judoka->firstname, ['class' => 'form-control', 'placeholder' => __('words.firstname')])}}
        </div>
        <div class="form-group">
            {{Form::label('birthyear', __('words.birth_years'))}}
            {{Form::select('birthyear',$ports['years'],null,['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('gender', __('words.gender'))}}
            {{Form::select('gender',$ports['gender'],null,['class' => 'form-control'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit(__('words.accept'), ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
    
@endsection