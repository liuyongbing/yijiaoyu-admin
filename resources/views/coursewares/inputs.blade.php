
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
        <!--课件:PPT-->
        @include('form.upload_ppt')
    </div>
    
    <!--课件:音乐-->
    <!--div class="form-group">
        @include('form.upload_music')
    </div-->
    
    <!--课件:PPT大文件服务器地址-->
    <div class="form-group">
        @include('form.upload_ppt_address')
    </div>
    
    <div class="form-group">
        @include('form.submit', ['route' => $route . '.index'])
    </div>
    
</fieldset>