<header id="wt-header" class="wt-header wt-haslayout">
    <div class="wt-navigationarea">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="wt-logo"><a href="{{ route('welcome') }}"><img src="" alt="SenFreelance"></a></strong>
                    <div class="wt-rightarea">
                        <nav id="wt-nav" class="wt-nav navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="lnr lnr-menu"></i>
                            </button>
                            <div class="collapse navbar-collapse wt-navigation" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a href="{{ route('about') }}">A Propos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('welcome') }}">Freelencers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('welcome') }}">Forfaits</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('contact') }}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        @if (Auth::check())
                        <div class="wt-userlogedin">
                            <figure class="wt-userimg">
                                <img src="images/user-img.jpg" alt="image description">
                            </figure>
                            <div class="wt-username">
                                <h3>Louanne Mattioli</h3>
                                <span>Amento Tech</span>
                            </div>
                            <nav class="wt-usernav">
                                <ul>
                                    <li class="menu-item-has-children page_item_has_children">
                                        <a href="javascript:void(0);">
                                            <span>Insights</span>
                                        </a>
                                        <ul class="sub-menu children">
                                            <li><a href="dashboard-insights.html">Insights</a></li>
                                            <li><a href="dashboard-insightsuser.html">Insights User</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="dashboard-profile.html">
                                            <span>My Profile</span>
                                        </a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="javascript:void(0);">
                                            <span>All Jobs</span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li><a href="dashboard-completejobs.html">Completed Jobs</a></li>
                                            <li><a href="dashboard-canceljobs.html">Cancelled Jobs</a></li>
                                            <li><a href="dashboard-ongoingjob.html">Ongoing Jobs</a></li>
                                            <li><a href="dashboard-ongoingsingle.html">Ongoing Single</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="dashboard-managejobs.html">
                                            <span>Manage Jobs</span>
                                        </a>
                                    </li>
                                    <li class="wt-notificationicon menu-item-has-children">
                                        <a href="javascript:void(0);">
                                            <span>Messages</span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li><a href="dashboard-messages.html">Messages</a></li>
                                            <li><a href="dashboard-messages2.html">Messages V 2</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="dashboard-saveitems.html">
                                            <span>My Saved Items</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard-invocies.html">
                                            <span>Invoices</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard-category.html">
                                            <span>Category</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard-packages.html">
                                            <span>Packages</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard-proposals.html">
                                            <span>Proposals</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard-accountsettings.html">
                                            <span>Account Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard-helpsupport.html">
                                            <span>Help &amp; Support</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index-2.html">
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>