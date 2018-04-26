@extends('layouts.base')

@section('body')
    <body class="bootstrap-admin-with-small-navbar">
    @include('layouts.header')
    @include('layouts.nav', ['verticalNavbarActive'=>'document'])

    <div class="container">
        <div class="row">
            @if (isset($contentType))
                @include('document.left_navbar', ['leftNavbarActive'=> $contentType . '_log', 'type' => $contentType])
            @else
            <div class="col-md-2 bootstrap-admin-col-left">
            
                <ul class="nav navbar-collapse collapse bootstrap-admin-navbar-side">
                
                @if (in_array($_GET['type'], ['speak', 'case', 'mapstorage', 'genealogy', 'reformmore', 'judiciarymore', 'literature']))
                    <li @if(array_key_exists('type', $_GET) && $_GET['type'] == 'speak') class="active"@endif>
                        <a href="{{ route('contents.list', ['type' => 'speak']) }}"><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;领导人语录</a>
                    </li>
                    <!--
                    <li @if(array_key_exists('type', $_GET) && $_GET['type'] == 'civilization') class="active"@endif>
                        <a href="/contents/manage/edit?type=civilization"><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;中华法系及法律文明</a>
                    </li>
                    -->
                    <li @if(array_key_exists('type', $_GET) && $_GET['type'] == 'case') class="active"@endif>
                        <a href="{{ route('contents.list', ['type' => 'case']) }}"><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;当代案件</a>
                    </li>
                    <li @if(array_key_exists('type', $_GET) && $_GET['type'] == 'mapstorage') class="active"@endif>
                        <a href="{{ route('contents.list', ['type' => 'mapstorage']) }}"><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;古代判例图库</a>
                    </li>
                    <li @if(array_key_exists('type', $_GET) && $_GET['type'] == 'genealogy') class="active"@endif>
                        <a href="{{ route('contents.list', ['type' => 'genealogy']) }}"><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;中华法系</a>
                    </li>
                    <!--
                    <li @if(array_key_exists('type', $_GET) && $_GET['type'] == 'reform') class="active"@endif>
                        <a href="{{ route('contents.list', ['type' => 'reform']) }}"><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;当代中国司法改革</a>
                    </li>
                    -->
                    <li @if(array_key_exists('type', $_GET) && $_GET['type'] == 'reformmore') class="active"@endif>
                        <a href="{{ route('contents.list', ['type' => 'reformmore']) }}"><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;当代中国司法改革</a>
                    </li>
                    <!--
                    <li @if(array_key_exists('type', $_GET) && $_GET['type'] == 'judge') class="active"@endif>
                        <a href="{{ route('contents.list', ['type' => 'judge']) }}"><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;中国大法官</a>
                    </li>
                    -->
                    <!--
                    <li @if(array_key_exists('type', $_GET) && $_GET['type'] == 'judiciary') class="active"@endif>
                        <a href="{{ route('contents.list', ['type' => 'judiciary']) }}"><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;中国司法制度</a>
                    </li>
                    -->
                    <li @if(array_key_exists('type', $_GET) && $_GET['type'] == 'judiciarymore') class="active"@endif>
                        <a href="{{ route('contents.list', ['type' => 'judiciarymore']) }}"><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;中国司法制度</a>
                    </li>
                    <li @if(array_key_exists('type', $_GET) && $_GET['type'] == 'literature') class="active"@endif>
                        <a href="{{ route('contents.list', ['type' => 'literature']) }}"><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;法律文献推荐</a>
                    </li>
                @endif
                
                @if (in_array($_GET['type'], ['event', 'relatedlaw']))
                    <li @if(array_key_exists('type', $_GET) && $_GET['type'] == 'event') class="active"@endif>
                        <a href="{{ route('contents.list', ['type' => 'event']) }}"><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;一带一路大事记</a>
                    </li>
                    <li @if(array_key_exists('type', $_GET) && $_GET['type'] == 'relatedlaw') class="active"@endif>
                        <a href="{{ route('contents.list', ['type' => 'relatedlaw']) }}"><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;一带一路相关法规</a>
                    </li>
                @endif

                </ul>

            </div>
            @endif

            @yield('content')

        </div>
    </div>
    @include('layouts.footer')

    </body>
@endsection


@section('script')

    <script type="text/javascript">
        var ue = UE.getEditor('ueditor_container', {
            toolbars: [
                ['bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'fullscreen',
                    '|', 'simpleupload', 'link']
            ],
            enableAutoSave: false,
            autoHeightEnabled: true,
            autoFloatEnabled: true,
            initialFrameHeight: 200
        });

        //对编辑器的操作最好在编辑器ready之后再做
        ue.ready(function () {
            ue.setContent($('#ueditor_container_value').attr('data-value'));
        });


//        $('.datepicker').datepicker({
//            changeMonth: true,
//            changeYear: true,
//            dateFormat: 'yy-mm-dd'
//        });


        $(".delete-contents").click(function () {
            if (confirm("确定要删除吗？")) {
                var thisObj = $(this);
                $.ajax({
                    type: "GET",
                    data: {'type': thisObj.attr('data-type'), '_id': thisObj.attr('data-_id')},
                    url: thisObj.attr('data-url'),
                    success: function (msg) {
                        thisObj.closest('tr').remove();
                    }
                });
            }
        });


    </script>
@endsection

