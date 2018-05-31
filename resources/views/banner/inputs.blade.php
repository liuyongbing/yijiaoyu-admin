
{{ csrf_field() }}

<fieldset>
    <div class="form-group">
        <!--位置-->
        @include('form.position', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--排序-->
        @include('form.sort', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--标题-->
        @include('form.title', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--图片-->
        @include('form.file', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--链接-->
        @include('form.url', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--链接打开方式-->
        @include('form.target', ['item' => $item])
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