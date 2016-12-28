@extends('frontend.layouts.default')
@section('content')

<div class="col-sm-10 col-sm-offset-1 mt-30 pt-30 bg-white shadow-lite">
    @include('frontend.layouts.partials.message')
    <div class="well well-sm col-sm-12 simplebox p-10">
        <h4>Edit Your Item</h4>
        <p class="text-muted text-danger"><i> <strong>*</strong> Your new or used item that you wish to get an exchange for. Fill all required fields!</i></p>
    </div>
    <div class="mt-20">
            <div class="row">

                <div class="col-sm-6">
                    <form class="form-horizontal" method="post" action="{{url('/items/update')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <input type="hidden" name="hashed_id" value="{{$item->hashed_id}}">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="col-sm-12">
                            <input type="text" class="form-control input-lg simplebox" name="name" value="{{ $item->name }}" placeholder="Type the name" autofocus>

                            @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            <select class="form-control input-lg simplebox" name="category_id" required>
                                <option value=""> -- Category --</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($item->category_id==$category->id){{"selected"}}@endif> {{ucfirst($category->name)}}</option>
                                @endforeach

                            </select>

                            @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('exchange') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            <input type="text" class="form-control input-lg simplebox" value="{{$item->exchange}}" name="exchange" placeholder="What are you exchanging it for?" required>

                            @if ($errors->has('exchange'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('exchange') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('state_id') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            <select class="form-control input-lg simplebox" name="state_id" required>
                                <option value=""> -- Select state --</option>
                                @foreach($states as $state)
                                <option value="{{$state->id}}" @if($item->state_id==$state->id){{"selected"}}@endif> {{ucfirst($state->name)}}</option>
                                @endforeach

                            </select>

                            @if ($errors->has('state_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            <input type="text" class="form-control input-lg simplebox" value="{{$item->address}}" name="address" placeholder="Additional address e.g street name">

                            @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            <textarea class="form-control input-lg simplebox" name="description" {{$item->description}} placeholder="Describe product(Optional)" rows="2"></textarea>

                            @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12 mb-5">
                            <button type="submit" class="btn btn-danger input-lg simplebox">
                                Submit
                            </button>
                        </div>
                    </div>
        </form>

    </div>
                <div class="col-sm-6">
                    <form>
                    <div class="row form-group">
                        @if(isset($item->images) && count($item->images) > 0)
                            @foreach($item->images as $image)
                            <div class="col-sm-6 upload-container">
                                <div class="col-sm-12">
                                    <div class="file-upload" style="background-image: url('{{$image->url}}')">
                                        {{--<img  class="advert-image img-responsive">--}}{{--
                                        <button type="button" data-bg-image="{{$image->url}}" class="btn btn-danger remove-img hidden simplebox" data-file-index="">x</button>
                                        <input type="file" class="upload product-image-input" name="images[]" accept="image/*"/>--}}
                                    </div>
                                </div>

                            </div>

                            @endforeach
                        @endif

                        <div class="clearfix"></div>

                    </div>
                    </form>
                </div>

            </div>
            <div class="clearfix"></div>



    </div>
</div>
@endsection
@section('include-js')
<script src="{{asset('/bower_components/jquery-text-counter/textcounter.min.js')}}"></script>
<script>
    $('input[name="name"]').textcounter({
        max: 22,
        counterText: "%d characters remaining",
        countSpaces: true,
        countDown: true
    });
</script>
@endsection
