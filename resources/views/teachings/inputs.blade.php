
{{ csrf_field() }}

<fieldset>
    <div class="form-group">
        <!--所属课程-->
        @include('form.course', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--所属课时-->
        @include('form.class', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--内容-->
        @include('form.contents_ueditor_teaching', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--页码-->
        @include('form.page_number', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--submit buttons-->
        @include('form.submit', ['route' => $route . '.index'])
    </div>
    
</fieldset>