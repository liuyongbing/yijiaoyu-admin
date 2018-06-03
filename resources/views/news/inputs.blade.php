
{{ csrf_field() }}

<fieldset>

    <div class="form-group">
        <!--所属分类-->
        @include('form.category')
    </div>

    <!--div class="form-group"-->
        <!--所属分馆-->
        <!-- include('form.branch') -->
    <!--/div-->
    
    <div class="form-group">
        <!--标题-->
        @include('form.title_news')
    </div>
    
    <div class="form-group">
        <!--内容-->
        @include('form.contents_ueditor')
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
        <!--submit buttons-->
        @include('form.submit', ['route' => 'grades.index'])
    </div>
    
</fieldset>