
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
        @include('form.content', ['item' => $item])
    </div>
                                
    <div class="form-group">
        <!--图片-->
        @include('form.file', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--排序-->
        @include('form.sort', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--submit buttons-->
        @include('form.submit', ['route' => $route . '.index'])
    </div>
    
</fieldset>