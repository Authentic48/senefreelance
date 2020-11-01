@extends('layouts.dashboard')

@section('content')
<section class="wt-haslayout">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
            <div class="wt-haslayout wt-dbsectionspace">
                <div class="wt-dashboardbox wt-dashboardtabsholder">
                    <div class="wt-dashboardboxtitle">
                        <h2>Formations</h2>
                    </div>
                    <div class="wt-tabscontent tab-content">
                        <div class="wt-personalskillshold tab-pane active fade show" id="wt-skills">
                            <div class="wt-yourdetails wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>Formations</h2>
                                </div>
                                <div class="wt-skillscontent-holder">
                                    <form class="wt-formtheme wt-skillsform"
                                        action="{{ route('formations.update', $formation->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                        <fieldset>
                                            <div class="form-group">
                                                <div class="form-group-holder">
                                                    <input type="text" name="name"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        placeholder="Nom" value="{{ old('name', $formation->name) }}">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group wt-btnarea">
                                                <button type="submit" class="wt-btn">
                                                    Save
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
    </div>
</section>
@endsection