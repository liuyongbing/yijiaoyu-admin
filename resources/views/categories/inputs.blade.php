
{{ csrf_field() }}

<fieldset>
    
    <div class="form-group">
        <!--分类-->
        @include('form.title')
    </div>
    
    <div class="form-group">
        <!--状态-->
        @include('form.status')
    </div>
    
    <div class="form-group">
        @include('form.submit', ['route' => $route . '.index'])
    </div>
    
</fieldset>