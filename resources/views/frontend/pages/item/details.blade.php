@extends('frontend.layouts.default')
@section('content')
    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a>
                    </li>
                    <li><a href="{{url('/categories/'.$item->category->id.'/details')}}">{{$item->category->name}}</a>
                    </li>
                    <li>{{$item->name}}</li>
                </ul>

            </div>

            <div class="col-md-3">
                <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Categories</h3>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            @if(isset($categories) && count($categories) > 0)
                                @foreach($categories as $category)
                                    <li @if($item->category->id == $category->id) class="active" @endif>
                                        <a href="/categories/{{$hashIds->encode($category->id)}}/items" title="{{ $category->name }}"> {{ shorten(ucfirst($category->name)) }} <span class="badge pull-right">{{$category->items_count}}</span></a>
                                    </li>
                                @endforeach
                            @else
                                <li class="text-danger">No categories yet!</li>
                            @endif

                        </ul>

                    </div>
                </div>

                            </div>

            <div class="col-md-9">

                <div class="row" id="productMain">
                    <div class="col-sm-6">
                        <div id="mainImage">
                            @if(isset($item->images) && count($item->images) > 0)
                                <img src="{{$item->images[0]->url}}" alt="" class="img-responsive">
                            @else
                                <img src="{{asset('custom/img/image_not_available.png')}}" alt="" class="img-responsive">
                            @endif
                        </div>

                        <div class="ribbon sale">
                            <div class="theribbon">ITEM PHOTO</div>
                            <div class="ribbon-background"></div>
                        </div>
                        <!-- /.ribbon -->

                        <div class="row mt-30" id="thumbs">
                            @if(isset($item->images) && count($item->images) > 0)
                                @foreach($item->images as $image)
                                    <div class="col-xs-4">
                                        <a href="{{$image->url}}" class="thumb">
                                            <img src="{{$image->url}}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-xs-4">
                                    <a href="{{asset('custom/img/image_not_available.png')}}" class="thumb">
                                        <img src="{{asset('custom/img/image_not_available.png')}}" alt="" class="img-responsive">
                                    </a>
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="box">
                            <h2 class="text-center text-muted">{{$item->name}}</h2>
                            <p class="text-center"><label class="label label-info p-10" style="font-size: 10pt;">In exchange for <i class="fa fa-arrow-down"></i></label></p>

                            <h3 class="text-center buttons">{{$item->exchange}}</h3>
                            <p class="goToDescription"><a href="#details" class="scroll-to">Scroll down to item details</a></p>

                        </div>

                        {{--<div class="row" id="thumbs">
                            @if(isset($item->images) && count($item->images) > 0)
                                @foreach($item->images as $image)
                                    <div class="col-xs-4">
                                        <a href="{{$image->url}}" class="thumb">
                                            <img src="{{$image->url}}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-xs-4">
                                    <a href="{{asset('custom/img/image_not_available.png')}}" class="thumb">
                                        <img src="{{asset('custom/img/image_not_available.png')}}" alt="" class="img-responsive">
                                    </a>
                                </div>
                            @endif
                        </div>--}}
                    </div>

                </div>


                <div class="box" id="details">
                    <h4>Item details</h4>
                    @if(!empty($item->description))
                        <blockquote>{{$item->description}}</blockquote>
                    @else
                        <p class="text-danger">Nothing to show.</p>
                    @endif


                    <h4>Call owner</h4>
                    @if(!empty($item->poster->mobile))
                        <blockquote>{{$item->poster->mobile}}</blockquote>
                    @else
                        <p class="text-danger">Phone no. not available.</p>
                    @endif

                    <h4>Item location</h4>
                    @if(!empty($item->state))
                        <blockquote>{{!empty($item->address) ? $item->address.', '.$item->state->name : $item->address}}</blockquote>
                    @else
                        <p class="text-danger">Location details not available.</p>
                    @endif

                    <hr>
                    <div class="social">
                        <h4>Show it to your friends</h4>
                        <p>
                            <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                        </p>
                    </div>
                </div>

                <div class="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height">
                            <h3>Similar items</h3>
                        </div>
                    </div>

                    @if(isset($similar) && count($similar) > 0)
                        @foreach($similar as $item)
                            <div class="col-md-3 col-sm-6">
                                <div class="product same-height">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <a href="/items/{{$hashIds->encode($item->id)}}/details">
                                                    @if(isset($item->images) && count($item->images) > 0)
                                                        <img src="{{$item->images[0]->url}}" alt="" class="img-responsive">
                                                    @else
                                                        <img src="{{asset('custom/img/image_not_available.png')}}" alt="" class="img-responsive">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="back">
                                                <a href="/items/{{$hashIds->encode($item->id)}}/details">
                                                    @if(isset($item->images) && count($item->images) > 0)
                                                        <img src="{{$item->images[0]->url}}" alt="" class="img-responsive">
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
                                        <h3><a href="/items/{{$hashIds->encode($item->id)}}/details">{{$item->name}}</a></h3>
                                        <p class="price">{{$item->state->name}}</p>
                                        <p class="price"><a href="/items/{{$hashIds->encode($item->id)}}/details" class="btn btn-primary">View Details</a></p>
                                    </div>
                                </div>
                                <!-- /.product -->
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-3 col-sm-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <p class="text-info">No similar items available!</p>
                                </div>

                            </div>
                        </div>
                    @endif

            </div>
            <!-- /.col-md-9 -->
        </div>
        <!-- /.container -->
    </div>
    </div>
@endsection