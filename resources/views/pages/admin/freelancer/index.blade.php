@extends('layouts.dashboard')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<section class="wt-haslayout wt-dbsectionspace">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="wt-dashboardbox wt-categorys">
                <div class="wt-dashboardboxtitle wt-titlewithsearch">
                    <h2>Freelancers</h2>
                    <form class="wt-formtheme wt-formsearch">
                        <fieldset>
                            <div class="form-group">
                                <input type="text" name="category" class="form-control" placeholder="Search Category">
                                <a href="javascrip:void(0);" class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></a>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="wt-dashboardboxcontent wt-categoriescontentholder">
                    <table class="wt-tablecategories">
                        <thead>
                            <tr>
                                <th>Icon</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Ref</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($freelancers as $freelancer)
                            <tr>
                                <td>
                                    <figure><img src="{{ Storage::disk('do_spaces')->url($freelancer->image) }}"
                                            alt="{{ $freelancer->name }}"></figure>
                                </td>
                                <td><a
                                        href="{{ route('admin.freelancers.show', $freelancer->ref) }}">{{ $freelancer->name }}</a>
                                </td>
                                <td>{{ $freelancer->email }}</td>
                                <td>{{ $freelancer->user_ref }}</td>
                                <td>
                                    <div class="wt-actionbtn">
                                        <a href="{{ route('admin.freelancers.edit', $freelancer->ref) }}"
                                            class="wt-addinfo wt-skillsaddinfo"><i class="lnr lnr-pencil"></i></a>
                                        <a href="{{ route('admin.freelancers.edit', $freelancer->ref) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete').submit();"
                                            class="wt-deleteinfo"><i class="lnr lnr-trash"></i></a>
                                        <form id="delete"
                                            action="{{ route('admin.freelancers.edit', $freelancer->ref) }}"
                                            method="post">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination ==== -->
                    {{ $freelancers->links('partials.paginator') }}
                    <!-- Pagination END ==== -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection