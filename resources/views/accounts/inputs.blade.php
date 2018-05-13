
{{ csrf_field() }}

<fieldset>
    
    <div class="form-group">
        <!--类型-->
        @include('form.account_type', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--账号-->
        @include('form.account', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--状态-->
        @include('form.status', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--submit buttons-->
        @include('form.submit', ['route' => $route . '.index'])
    </div>
    
</fieldset>