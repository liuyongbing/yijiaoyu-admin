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
                        <!--li>
                                    <a id="dLabel" href="http://web.ocl.com:8600/admin/documents/log?content_type=law" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">内容管理
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                                                                <li>
                                            <a href="http://web.ocl.com:8600/admin/documents/law">法律法规</a>
                                        </li>
                                                                                <li>
                                            <a href="http://web.ocl.com:8600/admin/documents/news">新闻</a>
                                        </li>
                                                                                <li>
                                            <a href="http://web.ocl.com:8600/admin/documents/case">判决文书</a>
                                        </li>
                                                                                <li>
                                            <a href="http://web.ocl.com:8600/admin/documents/typical_case">经典案例</a>
                                        </li>
                                                                                <li>
                                            <a href="http://web.ocl.com:8600/admin/documents/article">法律评论</a>
                                        </li>
                                                                                <li>
                                            <a href="http://web.ocl.com:8600/admin/contents/manage/list?type=speak">中华法律文化</a>
                                        </li>
                                                                                <li>
                                            <a href="http://web.ocl.com:8600/admin/contents/manage/list?type=event">一带一路政策</a>
                                        </li>
                                                                                <li>
                                            <a href="http://web.ocl.com:8600/admin/contents/manage/list"></a>
                                        </li>
                                    </ul>
                        </li-->
                        <li>
                            <a href="{{ route('users.index') }}">分馆管理</a>
                        </li>
                        <li>
                            <a href="{{ route('users.index') }}">教练管理</a>
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
