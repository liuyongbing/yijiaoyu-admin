@extends('layouts.base')

@section('title', '登录')

@section('body')
    <body class="bootstrap-admin-with-small-navbar">
        <div class="container">
            <div id="login-errors">
                @include('layouts.input_errors')
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="form_login" method="post" action="{{ route('auth') }}" class="bootstrap-admin-login-form">
                        {{ csrf_field() }}
                        <!--div style="height:38px;width:100%;float:left;margin-left:-20px;margin-top:-20px;margin-bottom:15px;">
                            <img src="{{ asset(elixir('images/logo-ocl.png')) }}" style="margin:auto 0;">
                        </div-->
                        <h1>登录</h1>
                        <div class="form-group">
                            <input id="mobile" class="form-control" type="text" name="Login[mobile]" placeholder="手机号">
                        </div>
                        <div class="form-group" style="overflow:hidden;">
                            <input id="code" class="form-control code-input" type="text" name="Login[code]" placeholder="验证码">
                            <input id="get_code" type="button" class="btn btn-lg btn-default code-btn" value="获取验证码" onclick="sendcode()" /> 

                        </div>
                        <button id="btn_login" class="btn btn-lg btn-primary" type="button">登录</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#btn_login').click(function() {
            var mobile = $('#mobile').val();
            if (!mobile) {
                alert('请输入手机号');
                return false;
            }
            var regMobile = /^1[3-9][0-9]\d{8}$/;
            if (!regMobile.test(mobile)) {
                alert('请输入11位手机号');
                return false;
            }
            var code = $('#code').val();
            if (!code) {
                alert('请输入验证码');
                return false;
            }
            if(!(/^\d{6}$/.test(code))){ 
                alert('请输入6位验证码');
                return false;
            }
            //$('#form_login').submit();
        
            $.ajax({
                method: "POST",
                url: "{{ route('auth') }}",
                data: { 
                    '_token' : '{{ csrf_token() }}',
                    'Login[mobile]' : mobile,
                    'Login[code]' : code
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status != 'success') {
                        alert(response.message);
                        return false;
                    }
                    
                    window.location.href = "{{ route('dashboard') }}";
                },
                error: function (XMLHttpRequest, textStatus, errorThrown)
                {
                    alert('服务器错误');
                }
            })
        });
    });
    //验证码
    var countdown = 120; 
    function sendcode() {
        var mobile = $('#mobile').val();
        if (!mobile) {
            alert('请输入手机号');
            return false;
        }
        var regMobile = /^1[3-9][0-9]\d{8}$/;
        if (!regMobile.test(mobile)) {
            alert('请输入11位手机号');
            return false;
        }
        
        $.ajax({
            method: "POST",
            url: "{{ route('sms.send') }}",
            data: { 
                _token : '{{ csrf_token() }}',
                mobile : mobile 
            },
            dataType: 'json',
            success: function(response) {
                
            }
        });
        var obj = $("#get_code");
        settime(obj);
    }
    function settime(obj) { //发送验证码倒计时
        if (countdown == 0) {
            obj.attr('disabled',false);
            //obj.removeattr("disabled");
            obj.val("获取验证码");
            countdown = 120;
            return;
        } else {
            obj.attr('disabled',true);
            obj.val("重新获取(" + countdown + ")");
            countdown--;
        }
        setTimeout(function() {
            settime(obj)
        } ,1000)
    }
</script>
@endsection