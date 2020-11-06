@extends('layouts.dashboard')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        <li> Tous les champs sont obligatoires. </li>
    </ul>
</div>
@endif
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<section class="wt-haslayout">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
            <div class="wt-haslayout wt-dbsectionspace">
                <div class="wt-dashboardbox wt-dashboardtabsholder">
                    <div class="wt-dashboardboxtitle">
                        <h2>Experience</h2>
                    </div>
                    <div class="wt-tabscontent tab-content">
                        <div class="wt-personalskillshold tab-pane active fade show">
                            <div class="wt-yourdetails wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>Mon Experience</h2>
                                </div>
                                <div class="wt-myskills">
                                    <ul class="sortable list">
                                        @foreach ($educations as $education)
                                        <div class="wt-accordioninnertitle">
                                            <span id="accordioninnertitlea">{{ $education->diploma }}<em>({{ $education->from }} - {{ $education->to }})</em></span>
                                            <div class="wt-rightarea">
                                                <a href="{{ route('education.edit', $education->id) }}" class="wt-addinfo"><i
                                                    class="lnr lnr-pencil"></i></a>
                                            <a href="{{ route('education.delete', $education->id)}}" onclick="event.preventDefault();
                                            document.getElementById('skill').submit();" class="wt-deleteinfo"><i class="lnr lnr-trash"></i></a>
                                                <form id="skill" action="{{ route('education.delete', $education->id)}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection