
{{ csrf_field() }}

<fieldset>
    <div class="form-group">
        <!--姓名-->
        @include('form.username', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--性别-->
        @include('form.gender', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--手机-->
        @include('form.mobile', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--邮箱-->
        @include('form.email', ['item' => $item])
    </div>
                                
    <div class="form-group">
        <!--地址-->
        @include('form.address', ['item' => $item])
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