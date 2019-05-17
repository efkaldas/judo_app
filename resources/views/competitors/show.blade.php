@extends('layouts.app')

@section('content')
    <h1>{{$event->name}}</h1>
    <h3>Užsiregistravę dalyviai</h3>
    <h3>Svorio kategorijos:</h3>
    <?php
    $i = "a";
    ?>
    @foreach ($event->groups as $group)
    <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#{{$group->name}}" aria-expanded="true" aria-controls="collapseOne">
                    {{$group->name}}
                  </button>
                </h5>
              </div>

          
              <div id={{$group->name}} class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                        @foreach ($event->categories as $category)
                        <?php
                        $i = $i ."a";
                        ?>
                        <div id="accordionn">
                                <div class="card">
                                  <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link" data-toggle="collapse" data-target="#{{$i}}" aria-expanded="true" aria-controls="collapseOne">
                                            {{$category->name}}
                                      </button>
                                    </h5>
                                  </div>
                                  <div id={{$i}} class="collapse" aria-labelledby="headingTwo" data-parent="#accordionn">
                                        <div class="card-body">
                                          @if ($category->events->find($event->id) &&  count($category->judokas) > 0)
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
                                                <?php $b = 1;
                                                ?>
                                                  
                                              @foreach ($category->judokas as $judoka)
                                              <tr>
                                                @if ($judoka->events->find($event->id))
                                                  
                                              <th scope="row">{{$b}}</th>
                                                  <td>{{$judoka->lastname}}</td>
                                                  <td>{{$judoka->firstname}}</td>
                                                  <td>{{$judoka->birthyear}}</td>
                                                  <td>{{$judoka->gender}}</td>
                                                  <td>
                                                  </td>
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
    @foreach ($event->groups as $group)
    <p>{{$group->name}}</p>
    @foreach ($group->categories as $category)
    <p>{{$category->name}}</p>
    @foreach ($category->judokas as $judoka)
    <p>{{$judoka->lastname}}</p>
    @endforeach
    @endforeach
    @endforeach


@endsection