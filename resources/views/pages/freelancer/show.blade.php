@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
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
                                        <img src="{{ Storage::disk('do_spaces')->url($freelancer->image) }}"
                                            alt="{{ $freelancer->name }}">
                                    </figure>
                                    <div class="wt-title">
                                        <h3>{{ $freelancer->name }}</h3>
                                        <span>{{ $freelancer->email }}<br>{{ $freelancer->phone }}<br> <a href="#"
                                                data-toggle="modal" data-target="#reviewermodal">Feedback</a> <br> <a
                                                href="#report" class="wt-reportuser">Signaler cet utilisateur</a></span>
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
                            @if ($freelancer->reviews->count() != 0)
                            <div class="wt-clientfeedback">
                                <div class="wt-usertitle wt-titlewithselect">
                                    <h2>Feedback des Clients</h2>
                                </div>
                                @foreach ($freelancer->reviews as $review)
                                <div class="wt-userlistinghold wt-userlistingsingle wt-bgcolor">	
                                    <figure class="wt-userlistingimg">
                                        <img src="images/client/img-03.jpg" alt="{{ $review->name }}">
                                    </figure>
                                    <div class="wt-userlistingcontent">
                                        <div class="wt-contenthead">
                                            <div class="wt-title">
                                                <a href="javascript:void(0);"><i class="fa fa-check-circle"></i> {{ $review->name }}</a>
                                                <h3>{{ $review->job }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wt-description">
                                        <p>{{ $review->description }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                            @if ($freelancer->educations->count() != 0)
                            <div class="wt-experience">
                                <div class="wt-usertitle">
                                    <h2>Education</h2>
                                </div>
                                <div class="wt-experiencelisting-hold">
                                    @foreach ($freelancer->educations as $education)
                                    <div class="wt-experiencelisting wt-bgcolor">
                                        <div class="wt-title">
                                            <h3>{{ $education->diploma }}</h3>
                                        </div>
                                        <div class="wt-experiencecontent">
                                            <ul class="wt-userlisting-breadcrumb">
                                                <li><span><i class="far fa-building"></i>
                                                        {{ $education->school }}</span></li>
                                                <li><span><i class="far fa-calendar"></i> {{ $education->from }} -
                                                        {{ $education->to }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="divheight"></div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            @if ($freelancer->experiences->count() != 0)
                            <div class="wt-experience wt-education">
                                <div class="wt-usertitle">
                                    <h2>Experience</h2>
                                </div>
                                <div class="wt-experiencelisting-hold">
                                    @foreach ($freelancer->experiences as $experience)
                                    <div class="wt-experiencelisting wt-bgcolor">
                                        <div class="wt-title">
                                            <h3>{{ $experience->company }}</h3>
                                        </div>
                                        <div class="wt-experiencecontent">
                                            <ul class="wt-userlisting-breadcrumb">
                                                <li><span><i class="far fa-building"></i>
                                                        {{ $experience->position }}</span></li>
                                                <li><span><i class="far fa-calendar"></i> {{ $experience->from }} -
                                                        {{ $experience->to }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="divheight"></div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
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
                            <div class="wt-widget wt-reportjob" id="report">
                                <div class="wt-widgettitle">
                                    <h2>Signaler cet utilisateur</h2>
                                </div>
                                <div class="wt-widgetcontent">
                                    <form class="wt-formtheme wt-formreport" action="{{ route('report.store') }}"
                                        method="POST">
                                        @csrf
                                        <fieldset>
                                            <div class="form-group">
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') }}" placeholder="Votre nom">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="text"
                                                    class="form-control @error('reason') is-invalid @enderror"
                                                    name="reason" value="{{ old('reason') }}" placeholder="Raison">
                                                @error('reason')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="text"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" placeholder="Email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <textarea name="description"
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    placeholder="Description">{{ old('description') }}</textarea>
                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <input class="d-none" type="text" name="freelancer_id"
                                                value="{{ $freelancer->id }}">
                                            <div class="form-group wt-btnarea">
                                                <button type="submit" class="wt-btn">Envoyer</button>
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
<!-- Popup Start-->
<div class="modal fade wt-offerpopup" tabindex="-1" role="dialog" id="reviewermodal">
    <div class="modal-dialog" role="document">
        <div class="wt-modalcontent modal-content">
            <div class="wt-popuptitle">
                <h2>Feedback</h2>
                <a href="javascript%3bvoid(0)%3b.html" class="wt-closebtn close"><i class="fa fa-close"
                        data-dismiss="modal" aria-label="Close"></i></a>
            </div>
            <div class="modal-body">
                <form class="wt-formtheme wt-formpopup" action="{{ route('review.store') }}" method="POST">
                    @csrf
                    <fieldset>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" placeholder="Nom">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control @error('job') is-invalid @enderror" name="job"
                                value="{{ old('job') }}" placeholder="Travaux">
                            @error('job')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                placeholder="Description">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <input class="d-none" type="text" name="freelancer_id"
                                                value="{{ $freelancer->id }}">
                        <div class="form-group wt-btnarea">
                            <button type="submit" class="wt-btn">Envoyer</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Popup End-->
@endsection