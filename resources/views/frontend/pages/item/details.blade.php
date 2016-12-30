@extends('frontend.layouts.default')
@section('content')

    <div class="col-sm-10 col-sm-offset-1 mt-30 mb-10 pt-30">
        <div class="col-sm-12 simplebox mb-10 shadow-lite custom-bar">
            <h4>{{$item->name}}</h4>
            <p class="text-success"><i class="fa fa-info-circle"></i> Item details</p>
        </div>


        <div class="mt-10">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="col-sm-12 bg-white p-20 shadow-lite">

                            <div class="product-details-image col-sm-12 shadow p-0">
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
                    <div class="col-sm-6">
                        <div class="col-sm-12 bg-white p-20 shadow-lite"><table class="table shadow-lite">
                                <tr>
                                    <th class="bg-hash">In exchange for</th>
                                    <td>{{$item->exchange}}</td>
                                </tr>
                                <tr>
                                    <th class="bg-hash">Poster</th>
                                    <td>{{$item->poster->fullName()}}</td>
                                </tr>
                                <tr>
                                    <th class="bg-hash">Contact Mobile No</th>
                                    <td class="bg-success">{{$item->poster->mobile}}</td>
                                </tr>
                                <tr>
                                    <th class="bg-hash">Item Category</th>
                                    <td>{{$item->category->name}}</td>
                                </tr>
                                @if(isset($item->address))
                                    <tr>
                                        <th class="bg-hash">Address</th>
                                        <td>{{$item->address}}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <th class="bg-hash">State</th>
                                    <td>{{$item->state->name}}</td>
                                </tr>
                                <tr>
                                    <th class="bg-hash">Views</th>
                                    <td>{{$item->views}}</td>
                                </tr>
                                <tr>
                                    <th class="bg-hash">Uploaded</th>
                                    <td>{{$item->created_at->diffForHumans()}}</td>
                                </tr>

                            </table>
                            <div class="panel panel-default simplebox">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Further description</strong></h3>
                                </div>
                                <div class="panel-body">
                                    @if(isset($item->description))
                                        <p>{{$item->description}}</p>
                                    @else
                                        <p class="text-danger">No description</p>
                                    @endif
                                </div>
                            </div></div>

                    </div>

                </div>
                <div class="clearfix"></div>

        </div>

    </div>
@endsection