
{{ csrf_field() }}

<fieldset>
    <div class="form-group">
        <!--所属班级-->
        @include('form.grade')
    </div>
    
    <div class="form-group">
        <!--标题-->
        @include('form.title')
    </div>
    
    <div class="form-group">
        <!-- 简介 -->
        @include('form.summary')
    </div>
    
    <div class="form-group">
        <!--总课时-->
        @include('form.class_total')
    </div>
    
    <div class="form-group">
        <!--排序-->
        @include('form.sort')
    </div>
    
    <div class="form-group">
        <!--图片-->
        @include('form.file')
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