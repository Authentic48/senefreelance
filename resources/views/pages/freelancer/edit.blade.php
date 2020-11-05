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
                        <h2>Profile</h2>
                    </div>
                    <div class="wt-tabscontent tab-content">
                        <div class="wt-personalskillshold tab-pane active fade show" id="wt-skills">
                            <div class="wt-yourdetails wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>Modifier votre profile</h2>
                                </div>
                                <form class="wt-formtheme wt-userform" method="POST"
                                    action="{{ route('freelancers.update') }}" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <fieldset>
                                        <div class="form-group form-group-half">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nom" name="name"
                                                value="{{ old('name', $freelancer->name) }}" placeholder="Nom">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group form-group-half">
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email', $freelancer->email) }}" placeholder="Email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group form-group-label">
                                            <div class="wt-labelgroup">
                                                <input type="file" name="image">
                                            </div>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group form-group-half">
                                            <span class="wt-select">
                                            <select name="region">
                                                @foreach ($regions as $region)
                                                <option {{ (old('region', $freelancer->region)) == $region->name ? "selected" : "" }}>{{ $region->name }}</option>
                                                @endforeach
                                            </select>
                                            </span>
                                        </div>
                                        <div class="form-group form-group-half">
                                            <input type="text"
                                                class="form-control @error('commune') is-invalid @enderror" name="commune"
                                                value="{{ old('commune', $freelancer->commune) }}" placeholder="Commune">
                                            @error('commune')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group form-group-half">
                                            <span class="wt-select">
                                                <select name="category" value="{{ old('category') }}">
                                                    @foreach ($categories as $category)
                                                    <option {{ (old('category', $freelancer->category)) == $category->name ? "selected" : "" }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </span>                    
                                        </div>
                                        <div class="form-group form-group-half">
                                            <input type="text" class="form-control @error('citizen') is-invalid @enderror" name="citizen"
                                                value="{{ old('citizen', $freelancer->citizenship) }}" placeholder="Nationalite">
                                            @error('citizen')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group form-group-half">
                                            <input type="text"
                                                class="form-control @error('profession') is-invalid @enderror" name="profession"
                                                value="{{ old('profession', $freelancer->profession) }}" placeholder="Profession">
                                            @error('profession')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group form-group-half">
                                            <input type="text"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                value="{{ old('phone', $freelancer->phone) }}" placeholder="phone">
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <textarea name="about" class="form-control @error('about') is-invalid @enderror" placeholder="Bio">{{ old('about', $freelancer->about) }}</textarea>
                                            @error('about')
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
