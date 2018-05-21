<nav class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar-sm" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown" id="admin">
                            <a href="#" role="button" class="dropdown-toggle admin_a" data-hover="dropdown"> <i class="glyphicon glyphicon-user"></i> {{ $account }} <i class="caret"></i></a>
                            <ul id="admin_ul" class="dropdown-menu">
                                <li><a href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
