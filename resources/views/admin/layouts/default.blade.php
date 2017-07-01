<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A platform to exhange your new/used valuables for another">
    <meta name="author" content="Barter">

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <title>{{$appName}} - Admin</title>

    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/core.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/components.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/pages.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/menu.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/plugins/switchery/switchery.min.css')}}"></script>
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css" />



    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{asset('assets/js/modernizr.min.js')}}"></script>

</head>


<body>


<!-- Navigation Bar-->
@include('admin.layouts.partials.header')
<!-- End Navigation Bar-->


<div class="wrapper">
    <div class="container">
        <div class="col-md-6 col-md-offset-3 mt-20">
            @if(Session::has('flash_message'))
                {!! Session::get('flash_message') !!}
            @endif
        </div>
        <div class="clearfix"></div>
        @yield('content')
        <!-- Footer -->
        @include('admin.layouts.partials.footer')
        <!-- End Footer -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->


<!-- jQuery  -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/detect.js')}}"></script>
<script src="{{asset('assets/js/fastclick.js')}}"></script>
<script src="{{asset('assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('assets/js/waves.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('assets/plugins/switchery/switchery.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/jquery.core.js')}}"></script>
<script src="{{asset('assets/js/jquery.app.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>


</body>
</html>
{{--


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="{{asset('/assets/images/favicon_1.ico')}}">

    <title>Ubold - Responsive Admin Dashboard Template</title>

    <link href="{{asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/css/core.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/css/components.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/css/pages.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/custom/style.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{asset('/assets/js/modernizr.min.js')}}"></script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-69506598-1', 'auto');
        ga('send', 'pageview');
    </script>

</head>

<body class="fixed-left">

<div class="animationload">
    <div class="loader"></div>
</div>

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    @include('admin.layouts.partials.header')
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    @include('admin.layouts.partials.asideleft')


    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                @if(Session::has('flash_message'))
                    {!! session('flash_message') !!}
                @endif
                @include('errors.errors')

                @yield('content')

            </div> <!-- container -->

        </div> <!-- content -->
        @include('admin.layouts.partials.asideright')


    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


    <!-- Right Sidebar -->
    @include('admin.layouts.partials.footer')
    <!-- /Right-bar -->


</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>


<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

</body>

</html>--}}
