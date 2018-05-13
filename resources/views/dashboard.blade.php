@extends('layouts.base')

@section('title', trans('common.app_name'))

@section('body')
    <body class="bootstrap-admin-with-small-navbar">
        @include('layouts.header')
        @include('layouts.nav', ['verticalNavbarActive'=>''])

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-header">
                                <div style="font-size: 20px;">欢迎登录后台，请选择菜单进行管理操作</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @include('layouts.footer')
    </body>
@endsection

