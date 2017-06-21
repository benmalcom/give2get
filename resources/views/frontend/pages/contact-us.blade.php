@extends('frontend.layouts.default')
@section('content')
    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a>
                    </li>
                    <li>Contact Us</li>
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
                    <h3>Contact Us</h3>
                    <p class="lead">Are you curious about something? Do you have some kind of problem with our items?</p>
                    <p>Please feel free to contact us, our customer service center is working for you 24/7.</p>

                    <hr>

                    <div class="row">
                        {{--<div class="col-sm-6">
                            <h3><i class="fa fa-map-marker"></i> Address</h3>
                            <p>13/25 New Avenue
                                <br>New Heaven
                                <br>45Y 73J
                                <br>England
                                <br>
                                <strong>Great Britain</strong>
                            </p>
                        </div>--}}
                        <!-- /.col-sm-4 -->
                        <div class="col-sm-6">
                            <h3><i class="fa fa-phone"></i> Call center</h3>
                            <p class="text-muted">This number is available for call reception, meanwhile call rates apply according to your network service provider.</p>
                            <p><strong>+23480xxxxxxxx</strong>
                            </p>
                        </div>
                        <!-- /.col-sm-4 -->
                        <div class="col-sm-6">
                            <h3><i class="fa fa-envelope"></i> Electronic support</h3>
                            <p class="text-muted">Please feel free to write an email to us or to use our electronic ticketing system.</p>
                            <ul>
                                <li><strong><a href="mailto:">support@tradebybarter.club</a></strong>
                                </li>
                                <li><strong><a href="mailto:">inquiries@tradebybarter.club</a></strong></li>
                            </ul>
                        </div>
                        <!-- /.col-sm-4 -->
                    </div>
                    <!-- /.row -->

                    <hr>

                    <form action="{{url('/contact-us')}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname">Name</label>
                                    <input type="text" required name="name" value="{{Auth::check() ? Auth::user()->fullName() : ''}}" class="form-control simplebox" id="firstname" placeholder="Your full name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" required name="email" value="{{Auth::check() ? Auth::user()->email : ''}}" class="form-control simplebox" id="email" placeholder="Your email">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea id="message" required name="message_body" rows="3" class="form-control simplebox" placeholder="Your message"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-envelope-o"></i> Send message</button>
                            </div>
                        </div>
                        <!-- /.row -->
                    </form>

                    <hr>
                </div>


            </div>
            <!-- /.col-md-9 -->
        </div>
        <!-- /.container -->
    </div>
@endsection