<footer id="wt-footer" class="wt-footer wt-haslayout">
    <div class="wt-footerholder wt-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="wt-footerlogohold">
                        <strong class="wt-logo"><a href="{{ route('welcome') }}"><img src="{{ asset('images/logo2.png')}}" alt="SenFreelance"></a></strong>
                        <div class="wt-description">
                            <p>SenFreelance est le premier portail d'annonce des freelancers au Senegal . Notre objectif est d'offrir aux particuliers <a href="{{ route('about')}}">plus...</a></p>
                        </div>
                        <ul class="wt-socialiconssimple wt-socialiconfooter">
                            <li class="wt-facebook"><a href="https://www.facebook.com/SEN-Freelance-100125081896889/"><i class="fa fa-facebook-f"></i></a></li>
                            <li class="wt-instagram"><a href="https://www.instagram.com/sen_freelance/"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                    <div class="wt-footercol wt-widgetcompany">
                        <div class="wt-fwidgettitle">
                            <h3>A propos</h3>
                        </div>
                        <ul class="wt-fwidgetcontent">
                            <li><a href="{{ route('about') }}">Qui sommes-nous ?</a></li>
                            <li><a href="{{ route('how') }}">Comment Ça Marche ?</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                    @if (!Auth::check())
                    <div class="wt-footercol wt-widgetcompany">
                        <div class="wt-fwidgettitle">
                            <h3>Nous Rejoindre</h3>
                        </div>
                        <ul class="wt-fwidgetcontent">
                            <li><a href="{{ route('register') }}">S'inscrire</a></li>
                            <li><a href="{{ route('login') }}">Se Connecter</a></li>
                        </ul>
                    </div> 
                    @endif
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                    <div class="wt-footercol wt-widgetexplore">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wt-haslayout wt-footerbottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p class="wt-copyrights"><a target="_blank" href="#">EliteTech Group</a></p>
                    <nav class="wt-addnav">
                        <ul>
                        <li>All Right Reserved</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>