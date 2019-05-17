@extends('layouts.app')

@section('content')

    <h1>{{$group->name}}</h1>
    @if (auth()->user()->admin)
    <div class="text-right">
        <a class="btn btn-dark btn-lg pull-right" href="judokas/create" role="button">Pridėti naują sportininką</a>
    </div><br>
    @endif
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
              @foreach ($categories as $category)
                @if ($category->events->find($event->id) && $category->judokas->find($judoka->id))
                <?php $or = TRUE; ?>
                @break
                @else
                <?php $or = FALSE; ?>  
                @endif
              @endforeach
              @if ($or == TRUE)
              <td>
                  @foreach ($categories as $category)
                  @if ($category->events->find($event->id) && $category->judokas->find($judoka->id))
                {{$category->name}}
                @endif
                @endforeach
              </td>
              <td>Užregistruotas <a class="btn btn-success" href="#" role="button">Spauzdinti</a></td>


              @else
              <td>
                {!! Form::open(['action' => ['GroupsController@update', $event->id, $group->id, $judoka->id], 'method' => 'POST']) !!}   
                {{Form::select('category',$ports,['class' => 'form-control'])}}
              </td><td>   
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