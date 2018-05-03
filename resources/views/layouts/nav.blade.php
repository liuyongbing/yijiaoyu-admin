<!-- main / large navbar -->
<nav id="navbar_nav" class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar bootstrap-admin-navbar-under-small" role="navigation">
    <div class="background_logo"></div>
    <div class="container " id="header-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('dashboard') }}">后台管理系统</a>
                </div>
                <div class="collapse navbar-collapse main-navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ route('users.index') }}">分馆管理</a>
                        </li>
                        <li>
                            <a href="{{ route('trainers.index') }}">教练管理</a>
                        </li>
                        <li>
                            <a href="{{ route('grades.index') }}">班级管理</a>
                        </li>
                        <li>
                            <a href="{{ route('courses.index') }}">课程管理</a>
                        </li>
                        <li>
                            <a href="{{ route('teachings.index') }}">课时管理</a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div>
    </div><!-- /.container -->
</nav>
