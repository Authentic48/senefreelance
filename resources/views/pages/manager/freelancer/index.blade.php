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
                                    <td><figure><img src="{{ Storage::disk('do_spaces')->url($freelancer->image) }}" alt="{{ $freelancer->name }}"></figure></td>
                                    <td><a href="{{ route('manager.freelancers.show', $freelancer->ref) }}">{{ $freelancer->name }}</a></td>
                                    <td>{{ $freelancer->email }}</td>
                                    <td>{{ $freelancer->user_ref }}</td>
                                    <td>
                                      @if (Auth::user()->hasRole('manager'))
                                      <div class="wt-actionbtn">
                                        <a href="{{ route('manager.freelancers.edit', $freelancer->ref) }}" class="wt-addinfo wt-skillsaddinfo"><i class="lnr lnr-pencil"></i></a>
                                        <a href="{{ route('manager.freelancers.edit', $freelancer->ref) }}" onclick="event.preventDefault(); document.getElementById('delete').submit();" class="wt-deleteinfo"><i class="lnr lnr-trash"></i></a>
                                        <form id="delete" action="{{ route('manager.freelancers.edit', $freelancer->ref) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </div>
                                      @endif
                                      @if (Auth::user()->hasRole('admin'))
                                      <div class="wt-actionbtn">
                                        <a href="{{ route('admin.freelancers.edit', $freelancer->ref) }}" class="wt-addinfo wt-skillsaddinfo"><i class="lnr lnr-pencil"></i></a>
                                        <a href="{{ route('admin.freelancers.edit', $freelancer->ref) }}" onclick="event.preventDefault(); document.getElementById('delete').submit();" class="wt-deleteinfo"><i class="lnr lnr-trash"></i></a>
                                        <form id="delete" action="{{ route('admin.freelancers.edit', $freelancer->ref) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </div>
                                      @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav class="wt-pagination">
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
    </section>
@endsection