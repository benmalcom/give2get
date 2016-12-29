@extends('frontend.layouts.default')
@section('content')
    <div class="row mt-10 row-offcanvas row-offcanvas-left">
        @include('frontend.layouts.partials.categories-aside')

        <div class="col-sm-9">
            @include('frontend.layouts.partials.mobile-toggler')
            @include('frontend.layouts.partials.search-filter-bar')
            <div class="col-sm-12 row">
                @if(isset($items) && count($items) > 0)
                    @foreach($items as $item)
                        <div class="col-sm-3">
                            <div class="col-sm-12 product-outer">

                                <div class="product-img shadow-lite">
                                    <a href="/items/{{$item->hashed_id}}/details">
                                        @if(isset($item->images) && count($item->images) > 0)
                                            <img src="{{$item->images[0]->url}}">
                                        @else
                                            <img src="/custom/img/image_not_available.png">
                                        @endif
                                    </a>
                                </div>
                                <div class="product-meta pt-10 mt-15">
                                    <h3 class="text-left text-custom text-muted">{{$item->name}}</h3>
                                    <p class="text-yellow"><small> <i class="fa fa-tags"></i> {{$item->category->name}}</small></p>
                                    <p class="text-default dk"><i class="fa fa-map-marker text-danger"></i> {{$item->state->name}}</p>
                                    <p><a href="/items/{{$item->hashed_id}}/details" class="btn btn-default btn-sm"><i class="fa fa-info-circle"></i> Details</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else

                            <div class="col-sm-12">
                                <h4 class="text-danger">No items available</h4>
                            </div>
                @endif


            </div>

        </div>
    </div>
@endsection