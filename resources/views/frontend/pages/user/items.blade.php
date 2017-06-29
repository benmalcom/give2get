@extends('frontend.layouts.default')
@section('content')
    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>My items</li>
                </ul>

            </div>

            <div class="col-md-3">
                <!-- *** CUSTOMER MENU *** -->
                @include('frontend.layouts.partials.dashboard-menu')
                        <!-- /.col-md-3 -->

                <!-- *** CUSTOMER MENU END *** -->
            </div>

            <div class="col-md-9">
                <div class="box">
                    <h3>My items</h3>
                    <p class="text-info">Here are all the items you have posted on this platform.</p>
                    <div class="row">
                        @if(!empty($items) && count($items) > 0)
                            @foreach($items as $item)
                            <div class="col-md-3 col-sm-4">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <a href="/items/{{$hashIds->encode($item->id)}}/details">

                                                    @if(isset($item->images) && count($item->images) > 0)
                                                        <img src="{{$item->images[0]->url}}" alt="" class="img-responsive item-img2">
                                                    @else
                                                        <img src="{{asset('custom/img/image_not_available.png')}}" alt="" class="img-responsive item-img2">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="back">
                                                <a href="/items/{{$hashIds->encode($item->id)}}/details">
                                                    @if(isset($item->images) && count($item->images) > 1)
                                                        <img src="{{$item->images[1]->url}}" alt="" class="img-responsive item-img2">
                                                    @else
                                                        <img src="{{asset('custom/img/image_not_available.png')}}" alt="" class="img-responsive item-img2">
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/items/{{$hashIds->encode($item->id)}}/details" class="invisible">
                                        @if(isset($item->images) && count($item->images) > 0)
                                            <img src="{{$item->images[0]->url}}" alt="" class="img-responsive item-img2">
                                        @else
                                            <img src="{{asset('custom/img/image_not_available.png')}}" alt="" class="img-responsive item-img2">
                                        @endif
                                    </a>
                                    <div class="text m-0">
                                        <h4 class="m-5 text-center"><a href="/items/{{$hashIds->encode($item->id)}}/details">{{$item->name}}</a></h4>
                                        <p class="price"><i class="fa fa-map-marker text-danger"></i> {{$item->state->name}}</p>
                                        <p class="buttons text-center"><a href="/items/{{$hashIds->encode($item->id)}}/details" class="btn btn-primary btn-sm">View Details</a></p>
                                    </div>
                                    <!-- /.text -->
                                </div>                                <!-- /.product -->
                            </div>
                            @endforeach
                        @else
                            <div class="col-sm-12 col-xs-12">
                                <p class="text-danger"><i class="fa fa-times"></i> You haven't added any item yet!</p>
                            </div>
                        @endif

                    </div>

                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
@endsection