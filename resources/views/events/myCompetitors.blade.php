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
    <h1>{{$event->name}}</h1>
    <h3>Užsiregistravę dalyviai</h3>
    <h3>Svorio kategorijos:</h3>
    @if (auth()->user()->admin)
    <div align="right">
    <a href="/events/{{$event->id}}/competitors/1/excel" class="btn btn-success">Spauzdinti į failą</a>
    </div>
    @endif
    <?php
    $i = "a";
    ?>
    @foreach ($event->groups as $group)
    <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{$group->name}}" aria-expanded="true" aria-controls="collapseOne">
                {{$group->name}}
              </button>
            </h5>
          </div>
      
          <div id="{{$group->name}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <table id="aaa" class="table table-striped">
                    <thead align="center"class="thead-dark">
                      <tr>
                        <th scope="col">Nr</th>
                        <th scope="col">Šalis</th>
                        <th scope="col">Pavardė</th>
                        <th scope="col">Vardas</th>
                        <th scope="col">Gimimo metai</th>
                        <th scope="col">Lytis</th>
                        <th scope="col">Klubas</th>
                      </tr>
                    </thead>
                    <tbody align="center">
                      <?php $b = 1;
                      ?>
                    @foreach ($competitors as $judoka)
                    @if ($group->competitors->find($judoka->id))
                    <tr>
                          
                    <th scope="row">{{$b}}</th>
                        <td>{{$judokas->where('id', $judoka->judoka_id)->first()->user->country}}/{{$judokas->where('id', $judoka->judoka_id)->first()->user->city}}</td>
                        <td>{{$judokas->where('id', $judoka->judoka_id)->first()->lastname}}</td>
                        <td>{{$judokas->where('id', $judoka->judoka_id)->first()->firstname}}</td>
                        <td>{{$judokas->where('id', $judoka->judoka_id)->first()->birthyear}}</td>
                        <td>{{$judokas->where('id', $judoka->judoka_id)->first()->gender}}</td>
                        <td>{{$judokas->where('id', $judoka->judoka_id)->first()->user->club}}</td>
                    </tr>
                    <?php $b = $b+1;
                    ?>
                      @endif
                    @endforeach
                    </tbody>
                    </table>
            </div>
          </div>
        </div>
      </div>
        <br>
@endforeach



@endsection