
{{ csrf_field() }}

<fieldset>
    
    <div class="form-group">
        <!--姓名-->
        @include('form.name')
    </div>

    <div class="form-group">
        <!--性别-->
        @include('form.gender')
    </div>

    <div class="form-group">
        <!--生日-->
        @include('form.birthday')
    </div>
    
    <div class="form-group">
        <!--身份证-->
        @include('form.id_number')
    </div>
    
    <div class="form-group">
        <!--家庭住址-->
        @include('form.address_family')
    </div>
    
    <div class="form-group">
        <!--在读学校-->
        @include('form.school')
    </div>
    
    <div class="form-group">
        <!--联系人-->
        @include('form.linkman')
    </div>
    
    <div class="form-group">
        <!--手机-->
        @include('form.mobile')
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