<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand " href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
        <!--    <ul class="navbar-nav mr-auto">

            </ul> -->
            @if (auth()->user())
                
            <div class="container">
            <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="/judokas">Mano sportininkai<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/events">Varžybų sąrašas<span class="sr-only">(current)</span></a>
                    </li>
                    @if (auth()->user()->admin)
                    <li class="nav-item active">
                      <a class="nav-link" href="/groups">Amžiaus grupės<span class="sr-only">(current)</span></a>
                    </li>                                           
                    @endif
                  </ul>
                </div>
                @endif

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Prisijungti') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registruotis') }}</a>
                        </li>
                    @endif
                @else
                @if (auth()->user()->admin)
                <li class="nav-item active">
                  <a class="nav-link" href="/users">Klubų tvirtinimas<span class="sr-only">(current)</span></a>
                </li>                                           
                @endif



                            <a class="btn btn-primary" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Atsijungti') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                @endguest
            </ul>
        </div>
</nav><br>