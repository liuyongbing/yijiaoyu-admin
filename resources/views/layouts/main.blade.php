@extends('layouts.base')

@section('body')
    <body class="bootstrap-admin-with-small-navbar">
        @include('layouts.header')

        @include('layouts.nav')

        <div class="container">
            <div class="row">

                @yield('content')
            </div>
        </div>
        @include('layouts.footer')
    </body>
@endsection