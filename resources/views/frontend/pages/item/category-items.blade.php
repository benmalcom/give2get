@extends('frontend.layouts.default')
@section('content')
    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>{{$category->name}}</li>
                </ul>

                <div class="box info-bar">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 products-showing">
                            Showing <strong>{{count($items)}}</strong> of <strong>{{$count}}</strong> products
                        </div>

                        <div class="col-sm-12 col-md-8  products-number-sort">
                            <div class="row">
                                <form class="form-inline">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="products-number">
                                            <strong>Show</strong>  <a href="#" class="btn btn-default btn-sm btn-primary">12</a>  <a href="#" class="btn btn-default btn-sm">24</a>  <a href="#" class="btn btn-default btn-sm">All</a> products
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row products">
                    @if(isset($items) && count($items) > 0)
                        @foreach($items as $item)
                        <div class="col-md-3 col-sm-4">
                            <div class="product">
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
                                    <p class="buttons"><a href="/items/{{$hashIds->encode($item->id)}}/details" class="btn btn-primary">View Details</a></p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        @endforeach

                    @else
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <p class="text-danger">No item available for this category!</p>
                                </div>

                            </div>
                        </div>
                    @endif
                </div>
                <!-- /.products -->

                <div class="pages">

                    <p class="loadMore">
                        <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a>
                    </p>

                    <ul class="pagination">
                        <li><a href="#">&laquo;</a>
                        </li>
                        <li class="active"><a href="#">1</a>
                        </li>
                        <li><a href="#">2</a>
                        </li>
                        <li><a href="#">3</a>
                        </li>
                        <li><a href="#">4</a>
                        </li>
                        <li><a href="#">5</a>
                        </li>
                        <li><a href="#">&raquo;</a>
                        </li>
                    </ul>
                </div>


            </div>
            <!-- /.col-md-9 -->

        </div>
        <!-- /.container -->
    </div>
@endsection