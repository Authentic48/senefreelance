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
                        <h2>Education</h2>
                    </div>
                    <div class="wt-tabscontent tab-content">
                        <div class="wt-personalskillshold tab-pane active fade show" id="wt-skills">
                            <div class="wt-yourdetails wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>Modifier</h2>
                                </div>
                                <form class="wt-formtheme wt-userform" method="POST"
                                    action="{{ route('education.update', $education->id) }}" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <fieldset>
                                        <div class="form-group form-group-half">
                                            <input type="text" class="form-control @error('school') is-invalid @enderror"
                                                placeholder="Etablissement" name="school"
                                                value="{{ old('school', $education->school) }}">
                                            @error('school')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group form-group-half">
                                            <input type="text"
                                                class="form-control @error('diploma') is-invalid @enderror" name="diploma"
                                                value="{{ old('diploma', $education->diploma) }}" placeholder="Diplome">
                                            @error('diploma')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group form-group-half">
                                            <input type="text" class="form-control @error('from') is-invalid @enderror"
                                                placeholder="De" name="from"
                                                value="{{ old('from', $education->from) }}">
                                            @error('from')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group form-group-half">
                                            <input type="text"
                                                class="form-control @error('to') is-invalid @enderror" name="to"
                                                value="{{ old('to', $education->to) }}" placeholder="A">
                                            @error('to')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group  wt-btnarea">
                                            <button type="submit" class="wt-btn">
                                                Sauvegarder
                                            </button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection