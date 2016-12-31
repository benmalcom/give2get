<!DOCTYPE HTML>
<html>

<head>
    <title>{{isset($title) ? $title : 'Give2get | Exchange your items for another'}}</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="keywords" content="Give2get Trade barter exchange valuables goods" />
    <meta name="description" content="Trade barter exchange valuables goods">
    <meta name="author" content="Barter">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:500,300,700,400italic,400' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <!-- <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'> -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'> -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    {{--<link rel="stylesheet" href="{{asset('/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('/bower_components/font-awesome/css/font-awesome.min.css')}}">
    @yield('include-css')
    <link rel="stylesheet" href="{{asset('/custom/css/barter.css')}}">

</head>

<body>
<div class="container-fluid clearfix flex-box" id="global-wrapper">
    @include('frontend.layouts.partials.header')
    @yield('content')

</div>
@include('frontend.layouts.partials.footer')

<script src="{{asset('/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
{{--<script src="{{asset('/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js')}}"></script>--}}
@yield('include-js')
<script src="{{asset('/custom/js/barter.js')}}"></script>

</body>

</html>
