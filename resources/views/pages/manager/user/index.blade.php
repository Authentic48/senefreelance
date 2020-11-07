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
                    <h2>Utilisateurs</h2>
                    <a href="{{ route('manager.users.create') }}" class="wt-btn ml-3">Ajouter</a>
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
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Ref</th>
                                <th>Date D'inscription</th>
                                <th>Date De Modification</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->ref }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>{{ $user->updated_at->diffForHumans() }}</td>
                                @if (!$user->hasRole('admin') && !$user->hasRole('manager'))
                                <td>
                                    <div class="wt-actionbtn">
                                        <a href="{{ route('manager.users.edit', $user->ref) }}"
                                            class="wt-addinfo wt-skillsaddinfo"><i class="lnr lnr-pencil"></i></a>
                                        <a onclick="event.preventDefault(); document.getElementById('delete').submit();" href="{{ route('manager.users.delete', $user->ref) }}"
                                            class="wt-deleteinfo"><i class="lnr lnr-trash"></i></a>
                                        <form action="{{ route('manager.users.delete', $user->ref) }}" method="POST" id="delete">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav class="wt-pagination">
                        <ul>
                            <li class="wt-prevpage"><a href="javascrip:void(0);"><i
                                        class="lnr lnr-chevron-left"></i></a></li>
                            <li><a href="javascrip:void(0);">1</a></li>
                            <li><a href="javascrip:void(0);">2</a></li>
                            <li><a href="javascrip:void(0);">3</a></li>
                            <li><a href="javascrip:void(0);">4</a></li>
                            <li><a href="javascrip:void(0);">...</a></li>
                            <li><a href="javascrip:void(0);">50</a></li>
                            <li class="wt-nextpage"><a href="javascrip:void(0);"><i
                                        class="lnr lnr-chevron-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection