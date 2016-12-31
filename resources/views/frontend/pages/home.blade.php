@extends('frontend.layouts.default')
@section('content')
    <div class="row mt-10 row-offcanvas row-offcanvas-left">
        @include('frontend.layouts.partials.categories-aside')

        <div class="col-sm-9">
            @include('frontend.layouts.partials.mobile-toggler')
            @include('frontend.layouts.partials.message')
            @include('frontend.layouts.partials.search-filter-bar')

            <div class="col-sm-12 row">
                @if(isset($items) && count($items) > 0)
                    @foreach($items as $item)
                        @include( 'frontend.layouts.partials.item' , [ 'item' => $item ] )
                        @endforeach
                @else
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <p class="text-info">No item available at this point!</p>
                            </div>

                        </div>
                    </div>
                @endif


            </div>

        </div>
    </div>
@endsection