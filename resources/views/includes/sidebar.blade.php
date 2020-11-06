<!--Sidebar Start-->
<div id="wt-sidebarwrapper" class="wt-sidebarwrapper">
    <div id="wt-btnmenutoggle" class="wt-btnmenutoggle">
        <span class="menu-icon">
            <em></em>
            <em></em>
            <em></em>
        </span>
    </div>
    <div id="wt-verticalscrollbar" class="wt-verticalscrollbar">
        <div class="wt-companysdetails wt-usersidebar">
            <figure class="wt-companysimg">
                <img src="images/sidebar/img-01.jpg" alt="img description">
            </figure>
            <div class="wt-companysinfo">
                @if (Auth::user()->image)
                <figure> <img src="{{ Storage::disk('do_spaces')->url(Auth::user()->image) }}" alt="img description"></figure>
                @endif
                <div class="wt-title">
                    <h2><a href="#">{{ Auth::user()->name }}</a></h2>
                    @if (Auth::user()->hasRole('freelencer'))
                     <span>Freelancer</span>
                    @endif
                    @if (Auth::user()->hasRole('admin'))
                     <span>Admin</span>
                    @endif
                    @if (Auth::user()->hasRole('manager'))
                     <span>Manager</span>
                    @endif
                </div>
            </div>
        </div>
        <nav id="wt-navdashboard" class="wt-navdashboard">
            <ul>
                @if (Auth::user()->hasRole('freelancer') &&
                !Auth::user()->hasFreelancerAccount(Auth::user()->id))
                <li>
                    <a href="{{ route('freelancers.create')}}">
                        <i class="ti-briefcase"></i>
                        <span>Creer mon profile</span>
                    </a>
                </li>
                @endif
                @if (Auth::user()->hasRole('freelancer') && Auth::user()->hasFreelancerAccount(Auth::user()->id))
                <li>
                    <a href="{{ route('freelancers.edit')}}">
                        <i class="ti-briefcase"></i>
                        <span>Mon profile</span>
                    </a>
                </li>
                @endif
                @if (Auth::user()->hasRole('freelancer') && Auth::user()->hasFreelancerAccount(Auth::user()->id))
                <li>
                    <a href="{{ route('skills.create')}}">
                        <i class="ti-briefcase"></i>
                        <span>Ajouter mes competences</span>
                    </a>
                </li>
                @endif
                @if (Auth::user()->hasRole('freelancer') && Auth::user()->hasFreelancerAccount(Auth::user()->id))
                <li>
                    <a href="{{ route('experiences.create')}}">
                        <i class="ti-briefcase"></i>
                        <span>Ajouter mon experience</span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{ route('profile') }}">
                        <i class="ti-briefcase"></i>
                        <span>Parametres</span>
                    </a>
                </li>
                @if (Auth::user()->hasRole('admin'))
                <li>
                    <a href="{{ route('categories') }}">
                        <i class="ti-briefcase"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('formations') }}">
                        <i class="ti-briefcase"></i>
                        <span>Formations</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('regions') }}">
                        <i class="ti-briefcase"></i>
                        <span>Regions</span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ti-shift-right"></i>
                        <span>Se deconnecter</span>
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </nav>
    </div>
</div>
<!--Sidebar Start-->