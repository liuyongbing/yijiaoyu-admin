<!-- main / large navbar -->
<nav id="navbar_nav" class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar bootstrap-admin-navbar-under-small" role="navigation">
    <!--div class="background_logo"></div-->
    <div class="container " id="header-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('dashboard') }}">{{ trans('common.app_name') }}</a>
                </div>
                <div class="collapse navbar-collapse main-navbar-collapse">
                    <ul class="nav navbar-nav">
                        <!--$verticalNavbarActive == $key ? 'class=active' : ''-->
                        <li>
                            <a href="{{ route('branches.index') }}">{{ trans('models.branches') }}管理</a>
                        </li>
                        <li>
                            <a href="{{ route('trainers.index') }}">{{ trans('models.trainers') }}管理</a>
                        </li>
                        <li>
                            <a href="{{ route('grades.index') }}">{{ trans('models.grades') }}管理</a>
                        </li>
                        <li>
                            <a href="{{ route('courses.index') }}">{{ trans('models.courses') }}管理</a>
                        </li>
                        <li>
                            <a href="{{ route('teachings.index') }}">{{ trans('models.teachings') }}管理</a>
                        </li>
                        <li>
                            <a href="{{ route('news.index') }}">{{ trans('models.news') }}管理</a>
                        </li>
                        <li>
                            <a href="{{ route('accounts.index') }}">{{ trans('models.accounts') }}管理</a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div>
    </div><!-- /.container -->
</nav>
