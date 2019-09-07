@extends('layouts.app')

@section('content')
    <h1>{{ __('words.my_judokas') }}</h1>
    <div class="text-right">
        <a class="btn btn-dark btn-lg pull-right" href="judokas/create" role="button">{{ __('words.add_new_judoka') }}</a>
    </div><br>
    @if (count($judokas) > 0)
    <table id="aaa" class="table table-striped">
        <thead align="center"class="thead-dark">
          <tr>
            <th scope="col">Nr</th>
            <th scope="col">{{ __('words.lastname') }}</th>
            <th scope="col">{{ __('words.firstname') }}</th>
            <th scope="col">{{ __('words.birth_years') }}</th>
            <th scope="col">{{ __('words.gender') }}</th>
            <th scope="col">{{ __('words.functions') }}</th>
          </tr>
        </thead>
        <tbody align="center">
          <?php $i = 1;
          ?>
        @foreach ($judokas as $judoka)
        <tr>
            
        <th scope="row">{{$i}}</th>
            <td>{{$judoka->lastname}}</td>
            <td>{{$judoka->firstname}}</td>
            <td>{{$judoka->birthyear}}</td>
            <td>{{$judoka->gender}}</td>
            <td>
              {!! Form::open(['action' => ['JudokasController@destroy', $judoka->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                  {{Form::hidden('_method', 'DELETE')}}
                  <a class="btn btn-success" href="/judokas/{{$judoka->id}}/edit" role="button">{{ __('words.edit') }}</a>
                  {{Form::submit( __('words.delete'), ['class' => 'btn btn-danger'])}}
              {!! Form::close() !!}
            </td>
        </tr>
        <?php $i = $i+1;
        ?>
        @endforeach
        </tbody>
        </table>
        {{$judokas->links()}}
    @else
        <p>{{ __('words.no_judokas') }}</p>
    @endif
@endsection