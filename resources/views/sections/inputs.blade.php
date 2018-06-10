
{{ csrf_field() }}

<fieldset>

    <div class="form-group">
        <!--页面-->
        @include('form.page')
    </div>

    <div class="form-group">
        <!--Code-->
        @include('form.code')
    </div>
    
    <div class="form-group">
        <!--名称-->
        @include('form.title')
    </div>
    
    <div class="form-group">
        <!--内容-->
        @include('form.contents_ueditor_section')
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
        @include('form.submit', ['route' => $route . '.index'])
    </div>
    
</fieldset>