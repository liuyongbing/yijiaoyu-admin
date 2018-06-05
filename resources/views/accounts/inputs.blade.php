
{{ csrf_field() }}

<fieldset>
    
    <div class="form-group">
        <!--类型-->
        @include('form.account_type')
    </div>
    
    <div class="form-group">
        <!--姓名-->
        @include('form.name')
    </div>
    
    <div class="form-group">
        <!--账号-->
        @include('form.account')
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