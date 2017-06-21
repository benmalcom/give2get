@extends('frontend.layouts.default')
@section('content')
    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a>
                    </li>
                    <li>How It Works</li>
                </ul>

            </div>

            <div class="col-md-3">
                <!-- *** PAGES MENU ***
_________________________________________________________ -->
                @include('frontend.layouts.partials.other-pages-sidebar')

                        <!-- *** PAGES MENU END *** -->

            </div>

            <div class="col-md-9">


                <div class="box" id="contact">
                    <h3>How {{$appName}} Works</h3>

                    <p class="lead">Steps To Follow To Barter on {{$appName}}</p>
                    <ul>
                    <li>Go through your store house attic and round up every item you don’t use or rarely use.</li>
                    <li>Post your items on {{$appName}}</li>
                    <li>Search for items of interest.</li>
                    <li>Regularly  check your dashboard for trade offers – to see what other Barterers have offered you.</li>
                    <li>The next thing is for you to select the offers you prefer.</li>
                    <li>Meet for the exchange.</li>
                    </ul>
                    <h3>Disclaimer</h3>
                    <p>
                        {{$appName}} is not responsible for any loss that may be involved during an exchange.
                        We strongly warn Barterers to meet in an open and public place to exchange items.
                    </p>
                    <hr>
                </div>


            </div>
            <!-- /.col-md-9 -->
        </div>
        <!-- /.container -->
    </div>
@endsection