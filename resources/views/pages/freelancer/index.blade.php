@extends('layouts.app')

@section('content')
<div class="wt-haslayout wt-innerbannerholder">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                <div class="wt-innerbannercontent">
                    <div class="wt-title">
                        <h2>Professionelles</h2>
                    </div>
                    <ol class="wt-breadcrumb">
                        <li><a href="{{ route('welcome') }}">Accueil</a></li>
                        <li class="wt-active">Professionelles</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
    <div class="wt-main-section wt-haslayout">
        <div class="wt-haslayout">
            <div class="container">
                <div class="row">
                    <div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
                            <div class="wt-usersidebaricon">
                                <span class="fa fa-cog wt-usersidebardown">
                                    <i></i>
                                </span>
                            </div>
                            <aside id="wt-sidebar" class="wt-sidebar wt-usersidebar">
                                <div class="wt-widget wt-effectiveholder">
                                    <div class="wt-widgettitle">
                                        <h2>Categories</h2>
                                    </div>
                                    <div class="wt-widgetcontent">
                                        <form class="wt-formtheme wt-formsearch">
                                            <fieldset>
                                               <div class="wt-checkboxholder wt-verticalscrollbar">
                                                @foreach ($categories as $category)
                                                <span class="wt-checkbox">
                                                    <input id="category" type="text" class="d-none" name="category">
                                                    <label for="category"> {{ $category->name }}</label>
                                                </span>
                                                @endforeach
                                            </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                                <div class="wt-widget wt-effectiveholder">
                                    <div class="wt-widgettitle">
                                        <h2>Region</h2>
                                    </div>
                                    <div class="wt-widgetcontent">
                                        <form class="wt-formtheme wt-formsearch">
                                            <fieldset>
                                                <div class="wt-checkboxholder wt-verticalscrollbar">
                                                    @foreach ($regions as $region)
                                                <span class="wt-checkbox">
                                                    <input id="region" type="text" class="d-none" name="region">
                                                    <label for="region"> {{ $region->name }}</label>
                                                </span>
                                                @endforeach
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
                            @foreach ($freelancers as $freelancer)
                            <div class="wt-userlistinghold">
                                    <figure class="wt-userlistingimg">
                                        <img src="{{ Storage::disk('do_spaces')->url($freelancer->image) }}" alt="{{ $freelancer->name }}">
                                    </figure>
                                    <div class="wt-userlistingcontent">
                                        <div class="wt-contenthead">
                                            <div class="wt-title">
                                                <a href="{{ route('freelancers.show', $freelancer->ref) }}"><i class="fa fa-check-circle"></i> {{ $freelancer->name }}</a>
                                                <h2> {{ $freelancer->profession }}</h2>
                                            </div>
                                            <ul class="wt-userlisting-breadcrumb">
                                                <li><span>{{ $freelancer->region }}</span></li>
                                                <li><span>{{ $freelancer->commune }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="wt-description">
                                        <p> {{ $freelancer->about }}</p>
                                    </div>
                                    <div class="wt-tag wt-widgettag">
                                        <a href="#">PHP</a>
                                        <a href="#">HTML</a>
                                        <a href="#">JavaScript</a>
                                        <a href="#">WordPress</a>
                                        <a href="#">Team Management</a>
                                        <a href="#">JQuery</a>
                                    </div>
                                </div>
                            @endforeach
                                <nav class="wt-pagination mt-5">
                                    <ul>
                                        <li class="wt-prevpage"><a href="javascrip:void(0);"><i class="lnr lnr-chevron-left"></i></a></li>
                                        <li><a href="javascrip:void(0);">1</a></li>
                                        <li><a href="javascrip:void(0);">2</a></li>
                                        <li><a href="javascrip:void(0);">3</a></li>
                                        <li><a href="javascrip:void(0);">4</a></li>
                                        <li><a href="javascrip:void(0);">...</a></li>
                                        <li><a href="javascrip:void(0);">50</a></li>
                                        <li class="wt-nextpage"><a href="javascrip:void(0);"><i class="lnr lnr-chevron-right"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection