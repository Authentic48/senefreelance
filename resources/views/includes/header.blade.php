<header id="wt-header" class="wt-header wt-haslayout">
    <div class="wt-navigationarea">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="wt-logo"><a href="{{ route('welcome') }}"><img src="{{ asset('images/logo2.png')}}"
                                alt="SenFreelance"></a></strong>
                    <div class="wt-rightarea">
                        <nav id="wt-nav" class="wt-nav navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="lnr lnr-menu"></i>
                            </button>
                            <div class="collapse navbar-collapse wt-navigation" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a href="{{ route('freelancers') }}">Professionelles</a>
                                    </li>
                                    @guest
                                    <li class="nav-item">
                                        <a href="{{ route('login') }}">Se Connecter</a>
                                    </li>
                                    @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a href="{{ route('register') }}">S'inscrire</a>
                                    </li>
                                    @endif
                                    @else
                                    <div class="wt-userlogedin">
                                        <figure class="wt-userimg">
                                            @if (Auth::user()->image)
                                            <img src="{{ Storage::disk('do_spaces')->url(Auth::user()->image) }}"
                                                alt="{{ Auth::user()->name }}">
                                            @endif
                                        </figure>
                                        <div class="wt-username">
                                            <h3>{{ Auth::user()->name }}</h3>
                                            <span>Freelancer</span>
                                        </div>
                                        <nav class="wt-usernav">
                                            <ul>
                                                @if (Auth::user()->hasRole('freelancer') &&
                                                !Auth::user()->hasFreelancerAccount(Auth::user()->id))
                                                <li>
                                                    <a href="{{ route('freelancers.create')}}">
                                                        <span>Creer mon profile</span>
                                                    </a>
                                                </li>
                                                @endif
                                                @if (Auth::user()->hasRole('manager'))
                                                <li>
                                                    <a href="{{ route('manager.users')}}">
                                                        <span>Utilisateurs</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('manager.freelancers')}}">
                                                        <span>Freelancers</span>
                                                    </a>
                                                </li>
                                                @endif
                                                @if (Auth::user()->hasRole('admin'))
                                                <li>
                                                    <a href="{{ route('admin.freelancers')}}">
                                                        <span>Freelancers</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.users')}}">
                                                        <span>Utilisateurs</span>
                                                    </a>
                                                </li>
                                                @endif
                                                @if (Auth::user()->hasRole('freelancer') &&
                                                Auth::user()->hasFreelancerAccount(Auth::user()->id))
                                                <li>
                                                    <a href="{{ route('freelancer.dashboard') }}">
                                                        <span>Mon profile</span>
                                                    </a>
                                                </li>
                                                @endif
                                                @if (Auth::user()->hasRole('freelancer') &&
                                                Auth::user()->hasFreelancerAccount(Auth::user()->id))
                                                <li>
                                                    <a href="{{ route('competences') }}">
                                                        <span>Competences</span>
                                                    </a>
                                                </li>
                                                @endif
                                                @if (Auth::user()->hasRole('freelancer') &&
                                                Auth::user()->hasFreelancerAccount(Auth::user()->id))
                                                <li>
                                                    <a href="{{ route('experiences') }}">
                                                        <span>Experiences</span>
                                                    </a>
                                                </li>
                                                @endif
                                                @if (Auth::user()->hasRole('freelancer') &&
                                                Auth::user()->hasFreelancerAccount(Auth::user()->id))
                                                <li>
                                                    <a href="{{ route('education') }}">
                                                        <span>Education</span>
                                                    </a>
                                                </li>
                                                @endif
                                                <li>
                                                    <a href="{{ route('profile')}}">
                                                        <span>Parametres</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                        <span>Se Deconnecter</span>
                                                    </a>
                                                </li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </ul>
                                        </nav>
                                    </div>
                                    @endguest
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>