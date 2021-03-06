
{{ csrf_field() }}

<fieldset>
    <div class="form-group">
        <!--标题-->
        @include('form.title', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--排序-->
        @include('form.sort', ['item' => $item])
    </div>
                                
    <div class="form-group">
        <!--图片-->
        @include('form.file', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--状态-->
        @include('form.status', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--submit buttons-->
        @include('form.submit', ['route' => 'grades.index'])
    </div>
    
</fieldset>