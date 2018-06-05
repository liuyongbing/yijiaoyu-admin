
{{ csrf_field() }}

<fieldset>

    <div class="form-group">
        <!--品牌-->
        @include('form.brand')
    </div>

    <div class="form-group">
        <!--团队-->
        @include('form.team')
    </div>
    
    <div class="form-group">
        <!--姓名-->
        @include('form.username')
    </div>
    
    <div class="form-group">
        <!--图片-->
        @include('form.file')
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
        @include('form.submit', ['route' => $route . '.index'])
    </div>
    
</fieldset>