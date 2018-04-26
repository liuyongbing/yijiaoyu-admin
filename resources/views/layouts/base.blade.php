<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset(elixir('css/app.css')) }}?20180426" rel="stylesheet">
    <link href="{{ asset(elixir('third/bootstrap-treeview.min.css')) }}" rel="stylesheet">
{{--    <link href="{{ asset(elixir('css/jquery-ui.min.css')) }}" rel="stylesheet">--}}
    @yield('style')

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
       <script type="text/javascript" src="{{ asset('js/lib/html5shiv.js') }}"></script>
       <script type="text/javascript" src="{{ asset('js/lib/respond.min.js') }}"></script>
    <![endif]-->

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
    @yield('body')

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset(elixir('js/app.js')) }}"></script>
    <script type="text/javascript" src="{{ asset(elixir('ueditor/ueditor.config.js')) }}"></script>
    <script type="text/javascript" src="{{ asset(elixir('ueditor/ueditor.all.js')) }}"></script>
    <script type="text/javascript" src="{{ asset(elixir('third/bootstrap-treeview.min.js')) }}"></script>
    @yield('script')
</html>
