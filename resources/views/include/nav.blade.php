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
                        <!--课件:齐天大圣(跆拳道)-->
                        <li class="{{ in_array(Route::currentRouteName(), [
                            'grades.index', 'grades.edit', 'grades.create',
                            'courses.index', 'courses.edit', 'courses.create',
                            'coursewares.index', 'coursewares.edit', 'coursewares.create',
                            'taekwondo.index'
                        ]) ? 'active' : '' }}">
                            <a href="{{ route('taekwondo.index') }}">{{ trans('brand.taekwondo') }}</a>
                        </li>
                        <!--课件:口袋猫(舞蹈)-->
                        <li class="{{ in_array(Route::currentRouteName(), [
                            'grades.index', 'grades.edit', 'grades.create',
                            'courses.index', 'courses.edit', 'courses.create',
                            'coursewares.index', 'coursewares.edit', 'coursewares.create',
                            'pocketcat.index'
                        ]) ? 'active' : '' }}">
                            <a href="{{ route('pocketcat.index') }}">{{ trans('brand.pocketcat') }}</a>
                        </li>
                        <!--课件:童画镇(绘画)-->
                        <li class="{{ in_array(Route::currentRouteName(), [
                            'grades.index', 'grades.edit', 'grades.create',
                            'courses.index', 'courses.edit', 'courses.create',
                            'coursewares.index', 'coursewares.edit', 'coursewares.create',
                            'town.index'
                        ]) ? 'active' : '' }}">
                            <a href="{{ route('town.index') }}">{{ trans('brand.town') }}</a>
                        </li>
                        <!--课件:学会玩(轮滑)-->
                        <li class="{{ in_array(Route::currentRouteName(), [
                            'grades.index', 'grades.edit', 'grades.create',
                            'courses.index', 'courses.edit', 'courses.create',
                            'coursewares.index', 'coursewares.edit', 'coursewares.create',
                            'skating.index'
                        ]) ? 'active' : '' }}">
                            <a href="{{ route('skating.index') }}">{{ trans('brand.skating') }}</a>
                        </li>
                        <!--课件:晓虎队(篮球)-->
                        <li class="{{ in_array(Route::currentRouteName(), [
                            'grades.index', 'grades.edit', 'grades.create',
                            'courses.index', 'courses.edit', 'courses.create',
                            'coursewares.index', 'coursewares.edit', 'coursewares.create',
                            'basketball.index'
                        ]) ? 'active' : '' }}">
                            <a href="{{ route('basketball.index') }}">{{ trans('brand.basketball') }}</a>
                        </li>
                        
                        <!--团队成员-->
                        <li class="{{ in_array(Route::currentRouteName(), ['members.index', 'members.edit', 'members.add']) ? 'active' : '' }}">
                            <a href="{{ route('members.index') }}">{{ trans('models.members') }}管理</a>
                        </li>
                        
                        <!--Banner-->
                        <li class="{{ in_array(Route::currentRouteName(), ['banner.index', 'banner.edit', 'banner.add']) ? 'active' : '' }}">
                            <a href="{{ route('banner.index') }}">{{ trans('models.banner') }}管理</a>
                        </li>
                        
                        <!--新闻-->
                        <li class="{{ in_array(Route::currentRouteName(), ['news.index', 'news.edit', 'news.add']) ? 'active' : '' }}">
                            <a href="{{ route('news.index') }}">{{ trans('models.news') }}管理</a>
                        </li>
                        
                        <!--分类-->
                        <li class="{{ in_array(Route::currentRouteName(), ['categories.index', 'categories.edit', 'categories.add']) ? 'active' : '' }}">
                            <a href="{{ route('categories.index') }}">{{ trans('models.categories') }}管理</a>
                        </li>
                        
                        <!--学员信息-->
                        <li class="{{ in_array(Route::currentRouteName(), ['students.index', 'students.edit', 'students.add']) ? 'active' : '' }}">
                            <a href="{{ route('students.index') }}">{{ trans('models.students') }}管理</a>
                        </li>
                        
                        @if (App\Constants\Dictionary::ACCOUNT_TYPE['ADMINISTRATOR'] == $accountType)
                        <!--账号-->
                        <li class="{{ in_array(Route::currentRouteName(), ['accounts.index', 'accounts.edit', 'accounts.add']) ? 'active' : '' }}">
                            <a href="{{ route('accounts.index') }}">{{ trans('models.accounts') }}管理</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
