
{{ csrf_field() }}

<fieldset>
    <div class="form-group">
        <!--位置-->
        @include('form.position')
    </div>
    
    <div class="form-group">
        <!--排序-->
        @include('form.sort')
    </div>
    
    <div class="form-group">
        <!--标题-->
        @include('form.title')
    </div>
    
    <div class="form-group">
        <!--图片-->
        @include('form.file', ['show_images_viewer' => 1])
    </div>
    
    <div class="form-group">
        <!--链接-->
        @include('form.url')
    </div>
    
    <div class="form-group">
        <!--链接打开方式-->
        @include('form.target')
    </div>
    
    <div class="form-group">
        <!--状态-->
        @include('form.status')
    </div>
    
    <div class="form-group">
        <!--submit buttons-->
        @include('form.submit', ['route' => $route . '.index'])
    </div>
    
</fieldset>