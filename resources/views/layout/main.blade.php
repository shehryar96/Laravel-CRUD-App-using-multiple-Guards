<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="PIXINVENT">
    @yield('title')
    {{-- <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png')}}"> --}}
    @include('layout.css.css')
    @yield('css')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="animsition">
    <div class="page-wrapper">
  
    @include('layout.sidebar')


    {{-- content divs --}}

    <div class="page-container">
        @include('layout.header')
        <div class="main-content">
            @yield('content')
        </div>
    </div>  


    @include('layout.js.js')
    @yield('scripts')
    </div>
</body>
</html>

@yield('modal')
