
{{ csrf_field() }}

<fieldset>

    <div class="form-group">
        <!--所属分类-->
        @include('form.category')
    </div>
    
    <div class="form-group">
        <!--标题-->
        @include('form.title_news')
    </div>
    
    <div class="form-group">
        <!--内容-->
        @include('form.contents_ueditor')
    </div>
    
    <div class="form-group">
        <!--自定义发布时间-->
        @include('form.published_at')
    </div>
    
    <div class="form-group">
        <!--排序-->
        @include('form.sort')
    </div>
    
    <div class="form-group">
        <!--状态-->
        @include('form.status')
    </div>
    
    <div class="form-group">
        @include('form.submit', ['route' => $route. '.index'])
    </div>
    
</fieldset>
