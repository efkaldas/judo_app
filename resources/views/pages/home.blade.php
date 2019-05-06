@extends('layouts.app')

@section('content')
@guest
    <div class="jumbotron text-center">
        <h1>Sveiki atvykę į dziudo registracijos sitemą</h1>
        <p>Tam, kad naudotis sitemą, pirmiausia turite prisijungti.</p>
        <p><a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Prisijungti</a> <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">Registruotis</a></p>
    </div>
@endguest
@endsection