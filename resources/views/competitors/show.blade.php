@extends('layouts.app')

@section('content')
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
    <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <div class="row">
                    <div class="col">
                      <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#{{$group->name}}" aria-expanded="true" aria-controls="collapseOne">
                          {{$group->name}}
                    </div>
                        </button>
                      </h5>
                    <div class="col">
                      <p align="right">Dalyvių skaičius: {{count($group->competitors)}}</p>
                    </div>
              </div>
            </div>

          
              <div id={{$group->name}} class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                        @foreach ($group->categories as $category)
                        <?php
                        $i = $i ."a";
                        ?>
                        <div id="accordionn">
                                <div class="card">
                                  <div class="card-header" id="headingTwo">
                                    <div class="row">
                                      <div class="col">
                                        <h5 class="mb-0">
                                          <button class="btn btn-link" data-toggle="collapse" data-target="#{{$i}}" aria-expanded="true" aria-controls="collapseOne">
                                            {{$category->name}}
                                          </button>
                                      </div>
                                        </h5>
                                      <div class="col">
                                        <p align="right">Dalyvių skaičius: {{count($category->competitors->where('group_id', $group->id))}}</p>
                                      </div>
                                    </div>
                                </div>
                                  <div id={{$i}} class="collapse" aria-labelledby="headingTwo" data-parent="#accordionn">
                                        <div class="card-body">
                                          @if (count($category->competitors->where('group_id', $group->id)) > 0) 
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
                                              @foreach ($category->competitors as $judoka)
                                              @if ($group->competitors->find($judoka->id))
                                              <tr>
                                                    
                                              <th scope="row">{{$b}}</th>
                                                  <td>{{$judokas->where('id', $judoka->judoka_id)->first()->user->country}}</td>
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
                                          @else
                                              <p>Sportininkų nerasta</p>
                                          @endif
                                            </div>
                                          </div>
                                        </div>
                                     </div>
                @endforeach
              </div>
            </div>
        </div>
    </div>
        @endforeach



@endsection