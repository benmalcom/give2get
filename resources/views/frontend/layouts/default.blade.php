<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Exchange your items for another">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>{{isset($appName) ? $appName : 'Give2get | Exchange your items for another'}}</title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.theme.css')}}" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="{{asset('css/style.default.css')}}" rel="stylesheet" id="theme-stylesheet">
    @yield('include-css')
    {{--<link rel="stylesheet" href="{{asset('/custom/css/barter.css')}}">--}}
    <!-- your stylesheet with modifications -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

    <script src="{{asset('js/respond.min.js')}}"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>

<!-- *** TOPBAR ***
_________________________________________________________ -->

@include('frontend.layouts.partials.header')
<div class="mt-20"></div>
<!-- /#navbar -->

<!-- *** NAVBAR END *** -->
<div id="all">
    <div class="col-md-6 col-md-offset-3 mt-10">
        @if(Session::has('flash_message'))
            {!! Session::get('flash_message') !!}
        @endif
    </div>
    <div class="clearfix"></div>
@yield('content')

</div>
<!-- /#all -->


<!-- *** SCRIPTS TO INCLUDE ***
_________________________________________________________ -->
<script src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.cookie.js')}}"></script>
<script src="{{asset('js/waypoints.min.js')}}"></script>
<script src="{{asset('js/modernizr.js')}}"></script>
<script src="{{asset('js/bootstrap-hover-dropdown.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/front.js')}}"></script>
@yield('include-js')
<script src="{{asset('js/custom.js')}}"></script>


</body>

</html>


{{--
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
    --}}
{{--<link rel="stylesheet" href="{{asset('/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')}}">--}}{{--

    <link rel="stylesheet" href="{{asset('/bower_components/font-awesome/css/font-awesome.min.css')}}">
    @yield('include-css')
    <link rel="stylesheet" href="{{asset('/custom/css/barter.css')}}">

</head>

<body>
        <div class="container-fluid clearfix p-0 m-0" id="global-wrapper">
            @include('frontend.layouts.partials.header')
            @yield('content')
        </div>

        @include('frontend.layouts.partials.footer')

<script src="{{asset('/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
--}}
{{--<script src="{{asset('/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js')}}"></script>--}}{{--

@yield('include-js')
<script src="{{asset('/custom/js/barter.js')}}"></script>

</body>

</html>
--}}
