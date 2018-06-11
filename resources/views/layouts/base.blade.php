<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/favicon.ico"/>
    <link rel="bookmark" href="/favicon.ico"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset(elixir('css/app.css')) }}{{ $STATIC_VERSION }}" rel="stylesheet">
    <link href="{{ asset(elixir('third/bootstrap-treeview.min.css')) }}{{ $STATIC_VERSION }}" rel="stylesheet">
    <link href="{{ asset(elixir('third/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')) }}{{ $STATIC_VERSION }}" rel="stylesheet">
    @yield('style')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
    @yield('body')

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset(elixir('js/jquery-3.1.0.min.js')) }}{{ $STATIC_VERSION }}"></script>
    <script type="text/javascript" src="{{ asset(elixir('js/app.js')) }}{{ $STATIC_VERSION }}"></script>
    <script type="text/javascript" src="{{ asset(elixir('third/bootstrap-treeview.min.js')) }}{{ $STATIC_VERSION }}"></script>
    <script type="text/javascript" src="{{ asset(elixir('third/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')) }}{{ $STATIC_VERSION }}"></script>
    <script type="text/javascript" src="{{ asset(elixir('ueditor/ueditor.config.js')) }}{{ $STATIC_VERSION }}"></script>
    <script type="text/javascript" src="{{ asset(elixir('ueditor/ueditor.all.js')) }}{{ $STATIC_VERSION }}"></script>
    @yield('script')
</html>