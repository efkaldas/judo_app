<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    </style>
</head>
<body>
    <div>
        <h1 class="small">{{$event->name}} {{$group->name}}</h1>
        <small>{{$event->place}} {{$event->date}}</small>
        <p><?php echo nl2br($event->description)?></p>   
    </div> 
    <div>
            <h3 class="small">Registruotas sportininkas:</h3>
            <h4 class="small">Šalis: {{$competitor->judokas->user->country}}</h4>  
            <h4 class="small">Pavardė: {{$competitor->judokas->lastname}}</h4> 
            <h4 class="small">Vardas: {{$competitor->judokas->firstname}}</h4> 
            <h4 class="small">Svorio Kategorija: {{$competitor->categories->name}}</h4>                   
    </div>
</body>
</html>