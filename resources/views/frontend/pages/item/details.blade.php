@extends('frontend.layouts.default')
@section('content')

    <div class="col-sm-8 col-sm-offset-2 mt-30 mb-10 pt-30">
                <div class="row">
                    <div class="col-sm-8 mb-10">
                        <div class="col-sm-12 bg-white p-20">
                            <h4 class="text-custom">{{$item->name}}</h4>
                            <p class="text-muted"><strong><i class="fa fa-map-marker"></i> {{$item->address.', '.$item->state->name}}</strong> | Added {{$item->created_at->diffForHumans()}}</p>

                            <div class="product-details-image col-sm-12 shadow-lite p-0">
                                @if(isset($item->images) && count($item->images) > 0)
                                    <img src="{{$item->images[0]->url}}" class="product-image-big" style="border: 4px solid #fff">
                                @else
                                    <img src="http://placehold.it/350x200" class="product-image-big" style="border: 4px solid #fff">
                                @endif
                            </div>
                            <div><hr></div>
                            <div class="mt-50">
                                @if(isset($item->images) && count($item->images) > 0)
                                    @foreach($item->images as $image)
                                        <a href="#" data-image-url="{{$image->url}}" class="image-thumb-anchor">
                                            <img src="{{$image->url}}" class="product-image-thumb shadow-lite">
                                        </a>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-sm-12">
                            <div class="list-group">
                                <div class="list-group-item row product-detail-widget">
                                    <div class="col-sm-3 col-xs-3 text-center bg-custom">
                                        <i class="fa fa-exchange fa-3x"></i>
                                    </div>
                                    <div class="col-sm-9 col-xs-9 detail-parent text-muted"><p class="detail">{{ucwords($item->exchange)}}</p></div>
                                </div>

                                <div class="list-group-item row product-detail-widget">
                                    <div class="col-sm-3 col-xs-3 text-center bg-warning">
                                        <i class="fa fa-map-marker fa-3x"></i>
                                    </div>
                                    <div class="col-sm-9 col-xs-9 detail-parent">
                                        <p class="detail text-muted">{{ucwords($item->address.','.$item->state->name)}}</p>
                                    </div>
                                </div>

                                <div class="list-group-item row product-detail-widget">
                                    <div class="col-sm-3 col-xs-3 text-center bg-custom">
                                        <i class="fa fa-tag fa-3x"></i>
                                    </div>
                                    <div class="col-sm-9 col-xs-9 detail-parent">
                                        <p class="detail text-muted">{{ucwords($item->category->name)}}</p>
                                    </div>
                                </div>

                                <div class="list-group-item row product-detail-widget">
                                    <div class="col-sm-3 col-xs-3 text-center bg-info">
                                        <i class="fa fa-eye fa-3x"></i>
                                    </div>
                                    <div class="col-sm-9 col-xs-9 detail-parent">
                                        <p class="detail text-muted"><strong>{{$item->views}}</strong> times</p>
                                    </div>
                                </div>


                                <div class="list-group-item row product-detail-widget">
                                    <h4 class="text-muted"><strong>Poster</strong></h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5 col-xs-5">
                                            <img src="{{ !empty($item->poster->avatar_url)  ?  $item->poster->avatar_url : '/custom/img/no_photo_available.png'}}" style="margin: 0 auto; width: 100%; border-radius: 70px !important;">
                                        </div>
                                        <div class="col-sm-7 col-xs-7 bg-info">
                                            <p class="text-muted"><strong>{{$item->poster->fullName()}}</strong></p>
                                            <p>{{$item->poster->mobile}}</p>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="clearfix"></div>

        </div>
      <div class="col-sm-10 col-sm-offset-1 mt-10">
          <h3 class="text-muted">Similar items</h3>
          <hr>
          <div class="row mb-10">
              @if(isset($similar) && count($similar) > 0)
                  @foreach($similar as $item)
                      @include( 'frontend.layouts.partials.item' , [ 'item' => $item ] )
                  @endforeach
              @else
                  <div class="col-sm-12">
                      <div class="panel panel-default">
                          <div class="panel-body">
                              <p class="text-info">No similar items available!</p>
                          </div>

                      </div>
                  </div>
              @endif


          </div>
      </div>
@endsection