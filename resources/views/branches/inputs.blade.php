
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
        <!--生日-->
        @include('form.birthday', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--预计加盟时间-->
        @include('form.expiry_date', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--城市-->
        @include('form.city', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--投资金额-->
        @include('form.investment_amount', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--身份证号-->
        @include('form.id_number', ['item' => $item])
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