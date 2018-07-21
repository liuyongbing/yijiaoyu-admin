
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
    
    <div class="form-group">
        <!--课件:音乐-->
        @include('form.upload_music')
    </div>
    
    <div class="form-group">
        @include('form.submit', ['route' => $route . '.index'])
    </div>
    
</fieldset>