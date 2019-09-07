<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand " href="{{ url('/') }}">
            {{__('words.app_name')}}
           <!--  config('app.name', 'Laravel')  -->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
        <!--    <ul class="navbar-nav mr-auto">

            </ul> -->
            
<li><a href="{{ url('locale/en') }}" ><i class="fa fa-language"></i> EN</a></li>

<li><a href="{{ url('locale/lt') }}" ><i class="fa fa-language"></i> LT</a></li>


            @if (auth()->user())
                
            <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="/judokas">{{__('words.my_judokas')}}<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/events">{{__('words.events_list')}}<span class="sr-only">(current)</span></a>
                    </li>
                  </ul>
                @endif

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{__('words.log_in')}}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{__('words.register')}}</a>
                        </li>
                    @endif
                @else
                @if (auth()->user()->admin)
                <li class="nav-item active">
                  <a class="nav-link" href="/users">Klubų tvirtinimas<span class="sr-only">(current)</span></a>
                </li>                                         
                @endif
                <li class="nav-item dropdown active">                    
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="/images/avatars/{{ auth()->user()->avatar }}" style="width:27px; height:27px;  top:1px; left:20px; border-radius:50%">
                                {{auth()->user()->club}}<span class="caret"></span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            <a class="dropdown-item" href="/profile">{{__('words.profile')}}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <i class="fab fa-accusoft"></i>
                                {{__('words.log_out')}}
                             </a>
                        </div>
                      </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                @endguest
            </ul>
        </div>
</nav><br>