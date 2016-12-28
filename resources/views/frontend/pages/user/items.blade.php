@extends('frontend.layouts.default')

@section('content')
    @include('frontend.layouts.partials.dashboard-menu')

    <div class="col-sm-10 col-sm-offset-1 mt-10 p-20 pt-20 bg-white shadow-lite">
        @include('frontend.layouts.partials.message')

        <div class="well well-sm col-sm-12 simplebox p-3">
            <h4>My Items</h4>
            <p class="text-muted text-warning"> <strong>*</strong> A summary of your items</p>
        </div>
        @if(!empty($items) && count($items) > 0)
        <div class="col-sm-12 row">
            @foreach($items as $item)
                <div class="col-sm-3">
                    <div class="col-sm-12 product-outer">

                        <div class="product-img">
                            @if(isset($item->images) && count($item->images) > 0)
                                <img src="{{$item->images[0]->url}}">
                            @else
                                <img src="/custom/img/image_not_available.png">
                            @endif
                        </div>
                        <div class="product-meta pt-10 mt-15">
                            <h3 class="text-left text-custom text-muted">{{$item->name}}</h3>
                            <p class="text-yellow"><small> <i class="fa fa-tags"></i> {{$item->category->name}}</small></p>
                            <p class="text-default dk"><i class="fa fa-map-marker text-danger"></i> {{$item->state->name}}</p>
                            <p>
                                <a href="/items/{{$item->hashed_id}}/details" class="btn btn-default btn-xs"><i class="fa fa-info-circle"></i> Details</a>
                                <a href="/items/{{$item->hashed_id}}/edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="/items/{{$item->hashed_id}}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                            </p>
                        </div>
                    </div>
                </div>

                @endforeach
        </div>
        @endif
        @if(empty($items) || count($items) == 0)
            <div>
                <p class="lead text-danger"><i class="fa fa-times"></i> You haven't added any item yet!</p>
            </div>
        @endif

    </div>
@endsection