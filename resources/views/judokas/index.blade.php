@extends('layouts.app')

@section('content')
    <h1>Mano sportininkai</h1>
    <div class="text-right">
        <a class="btn btn-dark btn-lg pull-right" href="judokas/create" role="button">Pridėti naują sportininką</a>
    </div><br>
    @if (count($judokas) > 0)
    <table id="aaa" class="table table-striped">
        <thead align="center"class="thead-dark">
          <tr>
            <th scope="col">Nr</th>
            <th scope="col">Pavardė</th>
            <th scope="col">Vardas</th>
            <th scope="col">Gimimo metai</th>
            <th scope="col">Lytis</th>
            <th scope="col">Funkcijos</th>
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
                  <a class="btn btn-success" href="/judokas/{{$judoka->id}}/edit" role="button">Redaguoti</a>
                  {{Form::submit('Trinti', ['class' => 'btn btn-danger'])}}
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
        <p>Sportininkų nerasta</p>
    @endif
@endsection