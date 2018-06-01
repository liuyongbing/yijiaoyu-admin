
{{ csrf_field() }}

<fieldset>

    <div class="form-group">
        <!--所属分类-->
        @include('form.category', ['item' => $item])
    </div>

    <div class="form-group">
        <!--所属分馆-->
        <!-- include('form.branch', ['item' => $item]) -->
    </div>
    
    <div class="form-group">
        <!--标题-->
        @include('form.title_news', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--内容-->
        @include('form.contents_ueditor', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--排序-->
        @include('form.sort', ['item' => $item])
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