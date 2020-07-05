<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand " href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto col-12 col-md-7">
                <li class="btn btn-outline-primary mt-2 col-12 col-md-3 col-lg-4 p-0 mr-2 {{active('contact/create')}}">
                    <a class="text-light btn btn-outline-primary d-block" href="{{route('contact.create')}}">Contacto</a>                   
                </li>
                @auth
                <li class="btn btn-outline-primary mt-2 col-12 col-md-3 col-lg-4 p-0 mr-2 {!!active('user/'.Auth::user()->id)!!}">
                    <a class="text-light btn btn-outline-primary d-block" href="{{route('user.show',Auth::user()->id)}}">Mi Perfil</a>
                </li>
                <li class="btn btn-outline-primary mt-2 col-12 col-md-3 col-lg-4 p-0 mr-2 {{active('user/'.Auth::user()->id.'/edit')}}">
                    <a class="text-light btn btn-outline-primary d-block" href="{{route('user.edit',Auth::user()->id)}}">Editar</a>
                </li>
                @endauth                                                              
            </ul>         

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto bg-dark text-primary">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" style="color: palegoldenrod;">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}" style="color: palegoldenrod;">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: palegoldenrod;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ ucfirst(Auth::user()->name) }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>        
    </div>
</nav>