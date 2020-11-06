@extends('layouts.app')

@section('content')
<div class="wt-haslayout wt-innerbannerholder wt-innerbannerholdervtwo">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
            </div>
        </div>
    </div>
</div>
<main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
    <div class="wt-main-section wt-paddingtopnull wt-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                    <div class="wt-userprofileholder">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-3 float-left">
                            <div class="row">
                                <div class="wt-userprofile">
                                    <figure>
                                        <img src="{{ Storage::disk('do_spaces')->url($freelancer->image) }}" alt="{{ $freelancer->name }}">
                                    </figure>
                                    <div class="wt-title">
                                        <h3><i class="fa fa-check-circle"></i>{{ $freelancer->name }}</h3>
                                        <span>{{ $freelancer->email }}<br>{{ $freelancer->phone }} </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-9 float-left">
                            <div class="row">
                                <div class="wt-proposalhead wt-userdetails">
                                    <h2>{{ $freelancer->profession }}</h2>
                                    <ul class="wt-userlisting-breadcrumb wt-userlisting-breadcrumbvtwo">
                                        <li>{{ $freelancer->region }}</li>
                                        <li>{{ $freelancer->commune }}</li>
                                    </ul>
                                    <div class="wt-description">
                                        <p>{{ $freelancer->about }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
                        <div class="wt-usersingle">
                            <div class="wt-clientfeedback">
                                <div class="wt-usertitle wt-titlewithselect">
                                    <h2>Client Feedback</h2>
                                    <div class="form-group">
                                        <span class="wt-select">
                                            <select>
                                                <option value="Show All">Show All</option>
                                                <option value="One Page">One Page </option>
                                                <option value="Two Page">Two Page</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="wt-userlistinghold wt-userlistingsingle wt-bgcolor">
                                    <figure class="wt-userlistingimg">
                                        <img src="images/client/img-03.jpg" alt="image description">
                                    </figure>
                                    <div class="wt-userlistingcontent">
                                        <div class="wt-contenthead">
                                            <div class="wt-title">
                                                <a href="javascript:void(0);"><i class="fa fa-check-circle"></i>
                                                    Photodune Professionals</a>
                                                <h3>Blog Post Writing in English Language</h3>
                                            </div>
                                            <ul class="wt-userlisting-breadcrumb">
                                                <li><span><i class="fa fa-dollar-sign"></i><i
                                                            class="fa fa-dollar-sign"></i><i
                                                            class="fa fa-dollar-sign"></i> Professional</span></li>
                                                <li><span><img src="images/flag/img-02.png" alt="img description">
                                                        United States</span></li>
                                                <li><span><i class="far fa-calendar"></i> Jun 2017</span></li>
                                                <li><span class="wt-stars"><span></span></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="wt-description">
                                        <p>“ Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et
                                            dolore magna aliquaenim ad minim veniamac quis nostrud exercitation ullamco
                                            laboris. ”</p>
                                    </div>
                                </div>
                                <div class="wt-btnarea">
                                    <a href="javascript:void(0);" class="wt-btn">Load More</a>
                                </div>
                            </div>
                           
                            <div class="wt-experience">
                                <div class="wt-usertitle">
                                    <h2>Experience</h2>
                                </div>
                                <div class="wt-experiencelisting-hold">
                                    <div class="wt-experiencelisting wt-bgcolor">
                                        <div class="wt-title">
                                            <h3>Web &amp; Apps Project Manager</h3>
                                        </div>
                                        <div class="wt-experiencecontent">
                                            <ul class="wt-userlisting-breadcrumb">
                                                <li><span><i class="far fa-building"></i> Amento Tech</span></li>
                                                <li><span><i class="far fa-calendar"></i> Aug 2017 - Till Now</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                   
                                    <div class="divheight"></div>
                                </div>
                            </div>
                            <div class="wt-experience wt-education">
                                <div class="wt-usertitle">
                                    <h2>Education</h2>
                                </div>
                                <div class="wt-experiencelisting-hold">
                                    <div class="wt-experiencelisting wt-bgcolor">
                                        <div class="wt-title">
                                            <h3>Web &amp; Apps Project Manager</h3>
                                        </div>
                                        <div class="wt-experiencecontent">
                                            <ul class="wt-userlisting-breadcrumb">
                                                <li><span><i class="far fa-building"></i> Amento Tech</span></li>
                                                <li><span><i class="far fa-calendar"></i> Aug 2017 - Till Now</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="divheight"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
                        <aside id="wt-sidebar" class="wt-sidebar">
                           @if ($freelancer->skills->count() != 0)
                           <div id="wt-ourskill" class="wt-widget">
                            <div class="wt-widgettitle">
                                <h2>Competences</h2>
                            </div>
                            <div class="wt-widgetcontent wt-skillscontent">
                           @foreach ($freelancer->skills as $skill)
                            <div class="wt-skillholder" data-percent="{{ $skill->percentage }}">
                                <span>{{ $skill->name }} <em>{{ $skill->percentage }}</em></span>
                                <div class="wt-skillbarholder">
                                    <div class="wt-skillbar"></div>
                                </div>
                            </div>
                           @endforeach
                        </div>
                        </div>
                           @endif
                            <div class="wt-widget wt-reportjob">
                                <div class="wt-widgettitle">
                                    <h2>Report This User</h2>
                                </div>
                                <div class="wt-widgetcontent">
                                    <form class="wt-formtheme wt-formreport">
                                        <fieldset>
                                            <div class="form-group">
                                                <span class="wt-select">
                                                    <select>
                                                        <option value="reason">Select Reason</option>
                                                        <option value="reason1">Reason1</option>
                                                        <option value="reason2">Reason2</option>
                                                        <option value="reason3">Reason3</option>
                                                        <option value="reason4">Reason4</option>
                                                    </select>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" placeholder="Description"></textarea>
                                            </div>
                                            <div class="form-group wt-btnarea">
                                                <a href="javascrip:void(0);" class="wt-btn">Submit</a>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection