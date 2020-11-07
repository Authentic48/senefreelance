@extends('layouts.dashboard')

@section('content')
<section class="wt-haslayout">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
            <div class="wt-haslayout wt-dbsectionspace">
                <div class="wt-dashboardbox wt-dashboardtabsholder">
                    <div class="wt-dashboardboxtitle">
                        <h2>Utilistaeurs</h2>
                    </div>
                    <div class="wt-tabscontent tab-content">
                        <div class="wt-personalskillshold tab-pane active fade show" id="wt-skills">
                            <div class="wt-yourdetails wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>Compte</h2>
                                </div>
                                <form class="wt-formtheme wt-userform" method="POST"
                                    action="{{ route('manager.users.update', $user->ref) }}" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <fieldset>
                                        <div class="form-group form-group-half">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                placeholder="First Name" name="name"
                                                value="{{ old('name', $user->name) }}" placeholder="Nom">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group form-group-half">
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email', $user->email) }}" placeholder="Email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group form-group-label">
                                            <div class="wt-labelgroup">
                                                <input type="file" name="image">
                                                @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
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
