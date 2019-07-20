@extends('layouts.app')

@section('content')

    <h1>{{$group->name}}</h1>
    @if (count($judokas) > 0)
    <table id="aaa" class="table table-striped">
        <thead align="center"class="thead-dark">
          <tr>
            <th scope="col">Nr</th>
            <th scope="col">Pavardė</th>
            <th scope="col">Vardas</th>
            <th scope="col">Gimimo metai</th>
            <th scope="col">Lytis</th>
            <th scope="col">Kategorija</th>
            <th scope="col">Būsena</th>
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
            @if ($group->competitors->where('judoka_id', $judoka->id)->pluck('judoka_id')->first() == $judoka->id)
                
            <td>{{$group->competitors->where('judoka_id', $judoka->id)->first()->categories->name}}</td>
            <td>Užregistruotas </td>
            <td>
            {!! Form::open(['action' => ['CompetitorsController@destroy', $event->id, $group->id, $group->competitors->where('judoka_id', $judoka->id)->first()->id], 
            'method' => 'POST', 'class' => 'pull-right']) !!}
              <a class="btn btn-success" href="{{$group->id}}/{{$group->competitors->where('judoka_id', $judoka->id)->first()->id}}/pdf"
                 role="button">Spauzdinti</a> 
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Atšaukti', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
            </td>
             @else
              <td>
                {!! Form::open(['action' => ['CompetitorsController@store', $event->id, $group->id, $judoka->id], 'method' => 'POST']) !!}   
                {{Form::select('category',$ports,['class' => 'form-control'])}}
              </td>
              <td>Neužregistruotas</td>
              <td>   
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Patvirtinti', ['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}</td>
                </tr>
                @endif   

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