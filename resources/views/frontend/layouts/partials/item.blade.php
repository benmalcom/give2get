<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="col-sm-12 product-outer">

        <div class="product-img">
            <a href="/items/{{$item->hashed_id}}/details">
                @if(isset($item->images) && count($item->images) > 0)
                    <img src="{{$item->images[0]->url}}">
                @else
                    <img src="/custom/img/image_not_available.png">
                @endif
            </a></div>
        <div class="product-meta pt-10 mt-15">
            <h3 class="text-left text-custom text-muted">{{$item->name}}</h3>
            <p class="text-default dk"><i class="fa fa-map-marker text-danger"></i> {{$item->state->name}}</p>
            <p><a href="/items/{{$item->hashed_id}}/details" class="btn btn-default btn-sm"><i class="fa fa-info-circle"></i> Details</a></p>
        </div>
    </div>
</div>