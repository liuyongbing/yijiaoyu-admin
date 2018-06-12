
{{ csrf_field() }}

<fieldset>
    <div class="form-group">
        <!--所属课程-->
        @include('form.course')
    </div>
    
    <div class="form-group">
        <!--所属课时-->
        @include('form.class')
    </div>
    
    <div class="form-group">
        <!--内容-->
        @include('form.contents_ueditor_teaching')
    </div>
    
    <div class="form-group">
        <!--页码-->
        @include('form.page_number')
    </div>
    
    <div class="form-group">
        <!--状态-->
        @include('form.status')
    </div>
    
    <div class="form-group">
        @include('form.submit', ['route' => $route . '.index'])
    </div>
    
</fieldset>