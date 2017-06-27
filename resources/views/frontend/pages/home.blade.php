@extends('frontend.layouts.default')
@section('content')

            <div id="content" class="mt-10">
                <!-- *** ADVANTAGES HOMEPAGE *** _________________________________________________________ -->
                <div id="advantages">

                    <div class="container">
                        <div class="same-height-row">
                            <div class="col-sm-4">
                                <div class="box same-height clickable">
                                    <div class="icon"><i class="fa fa-heart"></i>
                                    </div>

                                    <h3><a href="#">Don't Throw Stuffs Away</a></h3>
                                    <p>It can be helpful to someone else. Go through your store house attic and round up every item
                                        you don’t use or rarely use.</p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="box same-height clickable">
                                    <div class="icon"><i class="fa fa-tags"></i>
                                    </div>

                                    <h3><a href="#">Post your items</a></h3>
                                    <p>
                                       Post or search for items of interest. Regularly check your dashboard for

                                        trade offers – to see what other Barterers have offered you.
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="box same-height clickable">
                                    <div class="icon"><i class="fa fa-thumbs-up"></i>
                                    </div>

                                    <h3><a href="#">100% satisfaction guaranteed</a></h3>
                                    <p>Select which item fits your need and connect with the poster.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.container -->

                </div>
                <!-- /#advantages -->

                <!-- *** ADVANTAGES END *** -->

                <!-- *** HOT PRODUCT SLIDESHOW ***
        _________________________________________________________ -->
                <div id="hot">

{{--
                    <div class="box">
                        <div class="container">
                            <div class="col-md-12">
                                <h2>Recently uploaded</h2>
                            </div>
                        </div>
                    </div>
--}}

                    <div class="container">
                        <div class="product-slider">
                            @if(isset($items) && count($items) > 0)
                                @foreach($items as $item)
                                    <div class="item">
                                        <div class="product">
                                            <div class="flip-container">
                                                <div class="flipper">
                                                    <div class="front">
                                                        <a href="/items/{{$item->hashed_id}}/details">

                                                            @if(isset($item->images) && count($item->images) > 0)
                                                                <img src="{{$item->images[0]->url}}" alt="" class="img-responsive">
                                                            @else
                                                                <img src="{{asset('custom/img/image_not_available.png')}}" alt="" class="img-responsive">
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="back">
                                                        <a href="/items/{{$item->hashed_id}}/details">
                                                            @if(isset($item->images) && count($item->images) > 1)
                                                                <img src="{{$item->images[1]->url}}" alt="" class="img-responsive">
                                                            @else
                                                                <img src="{{asset('custom/img/image_not_available.png')}}" alt="" class="img-responsive">
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="/items/{{$item->hashed_id}}/details" class="invisible">
                                                @if(isset($item->images) && count($item->images) > 0)
                                                    <img src="{{$item->images[0]->url}}" alt="" class="img-responsive">
                                                @else
                                                    <img src="{{asset('custom/img/image_not_available.png')}}" alt="" class="img-responsive">
                                                @endif
                                            </a>
                                            <div class="text">
                                                <h3><a href="/items/{{$item->hashed_id}}/details">{{$item->name}}</a></h3>
                                                <p class="price"><i class="fa fa-map-marker text-danger"></i> {{$item->state->name}}</p>
                                                <p class="buttons"><a href="/items/{{$item->hashed_id}}/details" class="btn btn-primary">View Details</a></p>
                                            </div>
                                            <!-- /.text -->
                                        </div>
                                        <!-- /.product -->
                                    </div>

                                @endforeach
                            @else


                            @endif



                        </div>
                        <!-- /.product-slider -->
                    </div>
                    <!-- /.container -->

                </div>
                <!-- /#hot -->

                <!-- *** HOT END *** -->

                <!-- *** GET INSPIRED ***
        _________________________________________________________ -->
                <div class="container" data-animate="fadeInUpBig">
                    <div class="col-md-12">
                        <div class="box slideshow">
                            <h3>Get Inspired</h3>
                            <p class="lead">Get the inspiration from our world class designers</p>
                            <div id="get-inspired" class="owl-carousel owl-theme">
                                <div class="item">
                                    <a href="#">
                                        <img src="img/getinspired1.jpg" alt="Get inspired" class="img-responsive">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#">
                                        <img src="img/getinspired2.jpg" alt="Get inspired" class="img-responsive">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#">
                                        <img src="img/getinspired3.jpg" alt="Get inspired" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *** GET INSPIRED END *** -->

                <!-- *** BLOG HOMEPAGE ***
        _________________________________________________________ -->

                <div class="box text-center" data-animate="fadeInUp">
                    <div class="container">
                        <div class="col-md-12">
                            <h3 class="text-uppercase">Testimonials</h3>

                            <p class="lead">Here's what people have to say about {{$appName}}</p>
                        </div>
                    </div>
                </div>

                <div class="container">

                    <div class="col-md-12" data-animate="fadeInUp">

                        <div id="blog-homepage" class="row">
                            <div class="col-sm-6">
                                <div class="post">
                                    <h4><a href="post.html">Fashion now</a></h4>
                                    <p class="author-category">By <a href="#">John Slim</a> in <a href="">Fashion and style</a>
                                    </p>
                                    <hr>
                                    <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                                        ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                    <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a>
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="post">
                                    <h4><a href="post.html">Who is who - example blog post</a></h4>
                                    <p class="author-category">By <a href="#">John Slim</a> in <a href="">About Minimal</a>
                                    </p>
                                    <hr>
                                    <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                                        ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                    <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a>
                                    </p>
                                </div>

                            </div>

                        </div>
                        <!-- /#blog-homepage -->
                    </div>
                </div>
                <!-- /.container -->

                <!-- *** BLOG HOMEPAGE END *** -->


            </div>
            <!-- /#content -->

            <!-- *** FOOTER ***-->

            <div class="clearfix"></div>
            <div class="mb-10"></div>
            @include('frontend.layouts.partials.footer')

@endsection