
{{ csrf_field() }}

<fieldset>

    <div class="form-group">
        <!--所属品牌-->
        @include('form.brand_name', ['item' => $item])
    </div>

    <div class="form-group">
        <!--姓名-->
        @include('form.username', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--手机-->
        @include('form.mobile', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--预算-->
        @include('form.budget', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--省市区-->
        @include('form.province_city_area', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--地址-->
        @include('form.address', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--内容-->
        @include('form.summary', ['item' => $item])
    </div>
    
    <div class="form-group">
        <!--备注-->
        @include('form.remark', ['item' => $item])
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