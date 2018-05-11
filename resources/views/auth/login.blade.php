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
                    <form method="post" action="{{ route('auth') }}" class="bootstrap-admin-login-form">
                        {{ csrf_field() }}
                        <!--div style="height:38px;width:100%;float:left;margin-left:-20px;margin-top:-20px;margin-bottom:15px;">
                            <img src="{{ asset(elixir('images/logo-ocl.png')) }}" style="margin:auto 0;">
                        </div-->
                        <h1>登录</h1>
                        <div class="form-group">
                            <input id="mobile" class="form-control" type="text" name="mobile" placeholder="手机号">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="code" placeholder="验证码">
                        </div>
                        <button class="btn btn-lg btn-primary" type="submit">登录</button>
                        <a id="get_code" href="javascript:void(0);" class="btn btn-lg btn-default">获取验证码</a>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#get_code').click(function() {
            var mobile = $('#mobile').val();
            if (!mobile) {
                alert('请输入登录手机号');
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
        });
    });
</script>
@endsection