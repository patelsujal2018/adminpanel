<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" src="{{ url('backend/uploads/profile/profile.jpg') }}" width="55" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}</strong>
                            </span>
                            <span class="text-muted text-xs block">{{ Sentinel::getUser()->roles()->first()->name }} <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="">Profile</a></li>
                        <li><a href="">Contacts</a></li>
                        <li><a href="">Mailbox</a></li>
                        <li><a href="">Change Password</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('sentinel_logoutprocess') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li>
                <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li>
                <a href="{{ route('sections.index') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Sections</span></a>
            </li>
            <li>
                <a href="{{ route('company.index') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Company</span></a>
            </li>
        </ul>
    </div>
</nav>