<div class="wt-haslayout wt-innerbannerholder">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                <div class="wt-innerbannercontent">
                <div class="wt-title"><h2>A Propos</h2></div>
                <ol class="wt-breadcrumb">
                    <li><a href="{{ route('welcome') }}">Accueil</a></li>
                    <li class="wt-active">A Propos</li>
                </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
    <div class="wt-haslayout wt-main-section">
        <section class="wt-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="wt-greeting-holder">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                                    <div class="wt-greetingcontent">
                                        <div class="wt-sectionhead">
                                            <div class="wt-sectiontitle">
                                                <h2>A Propos</h2>
                                            </div>
                                            <div class="wt-description">
                                                <p>SenFreelance est le premier portail d’annonce des professionnels au Sénégal. Notre objectif est d’offrir aux particuliers et aux professionnels le moyen le plus fiable et le plus simple pour réaliser vos travaux. Le fonctionnement est simple: les freelances  que nous sélectionnons proposent leurs services. Les clients peuvent donc choisir dans un vaste catalogue le freelance qui correspond le mieux à la réalisation de leur projet. Tous deux peuvent ensuite communiquer directement sur le projet. L’inscription est totalement gratuite.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="wt-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="wt-signupholder">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 pull-right">
                                <div class="wt-signupcontent">
                                    <div class="wt-title">
                                        <h2><span>Devenir</span>Freelancer</h2>
                                    </div>
                                    <div class="wt-description">
                                        <p>Faire son annonce, c'est partagez sa passion et  son expertise!</p>
                                    </div>
                                    <div class="wt-btnarea">
                                        @if (!Auth::check())
                                        <a href="{{ route('register') }}" class="wt-btn wt-btnvtwo">S'inscrire</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>