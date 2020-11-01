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
                        <h2>Categories</h2>
                    </div>
                    <div class="wt-tabscontent tab-content">
                        <div class="wt-personalskillshold tab-pane active fade show" id="wt-skills">
                            <div class="wt-yourdetails wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>Modifier</h2>
                                </div>
                                <div class="wt-skillscontent-holder">
                                    <form class="wt-formtheme wt-skillsform" action="{{ route('categories.update', $category->id)}}"
                                        method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <fieldset>
                                            <div class="form-group">
                                                <div class="form-group-holder">
                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                                        placeholder="Nom" value="{{ old('name', $category->name) }}">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group wt-btnarea">
                                                <button type="submit" class="wt-btn">
                                                    Ajouter
                                                </button>
                                            </div>
                                        </fieldset> 
                                    </form>
                                    <div class="wt-myskills">
                                        <a href="{{ route('subcategories.create') }}" class="wt-btn mb-3">
                                            Ajouter sub
                                        </a>
                                        <ul class="sortable list">
                                          @foreach ($category->subcategories as $category)
                                          <li>
                                            <div class="wt-dragdroptool"><a href="javascript:void(0)"
                                                    class="lnr lnr-menu"></a></div>
                                            <span class="skill-dynamic-html">{{ $category->name }}</span>
                                            <div class="wt-rightarea">
                                                <a href="{{ route('subcategories.edit', $category->id) }}" class="wt-addinfo"><i class="lnr lnr-pencil"></i></a>
                                                <a href="{{ route('subcategories.delete', $category->id)}}" onclick="event.preventDefault();
                                                document.getElementById('del').submit();" class="wt-deleteinfo"><i
                                                        class="lnr lnr-trash"></i></a>
                                            </div>
                                            <form action="{{ route('categories.delete', $category->id)}}" id="del" method="POST">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </li>
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
    </div>
</section>
@endsection