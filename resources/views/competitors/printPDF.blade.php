<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        *{ font-family: DejaVu Sans !important;}
        .small {
         line-height: 0.7;
        }

        .big {
        line-height: 1.8;
        }
        .column {
        float: left;
        width: 50%;
        }

/* Clear floats after the columns */
        .row:after {
        content: "";
        display: table;
         clear: both;
        }
    </style>
</head>
<body>
    <div>
        <h1 class="small">{{$event->name}} {{$group->name}}</h1>
        <p>Varžybų vieta: {{$event->place}}</p>
        <p>Data ir laikas: {{$group->start_date}} {{substr($group->start_time, 0, -3)}}</p>
        <p>Gmimimo metai: {{$group->year_from}} - {{$group->year_to}}</p>
        <h4>Svorio kategorijos:</h4>
        <p>
        @foreach ($group->categories as $category){{$category->name}}
        @endforeach
        </p>
        <h4>Svėrimas:</h4>
        <p>Data ir laikas: {{$group->weight_date}} {{substr($group->weight_time_from, 0, -3)}} - {{substr($group->weight_time_to, 0, -3)}}</p>
    </div> 
    <div class="row">
        <div class="column">
            <h3 class="small">Registruotas sportininkas:</h3>
            <h4 class="small">Šalis: {{$competitor->judokas->user->country}}</h4>
            <h4 class="small">Klubas: {{$competitor->judokas->user->club}}</h4>    
            <h4 class="small">Pavardė: {{$competitor->judokas->lastname}}</h4> 
            <h4 class="small">Vardas: {{$competitor->judokas->firstname}}</h4> 
            <h4 class="small">Svorio Kategorija: {{$competitor->categories->name}}</h4>   
        </div>
        <div class="column">
            <img src="<?php echo $_SERVER["DOCUMENT_ROOT"]; ?>/images/PDFimage.jpeg" alt="">
        </div>                
    </div>
</body>
</html>