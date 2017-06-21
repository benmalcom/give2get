@extends('frontend.layouts.default')
@section('content')

    <div class="col-sm-8 col-sm-offset-2 pt-30">
            <div class="col-sm-12 simplebox mb-10 shadow bg-white">
                <h4 class="text-muted"><strong>Add Your Item</strong></h4>
                <p class="text-danger"><i class="fa fa-info-circle"></i> The images cannot be changed later!</p>
            </div>


        <div class="mt-10">
            <form class="form-horizontal" method="post" action="{{url('/items/add')}}" enctype="multipart/form-data">
                <div class="row">

                    {{ csrf_field() }}
                    <div class="col-sm-6">
                        <div class="col-sm-12 bg-white p-20 shadow">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control simplebox" required name="name" value="{{ old('name') }}" placeholder="Type the name" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">

                                <div class="col-sm-12">
                                    <select class="form-control simplebox" name="category_id" required>
                                        <option value=""> -- Category --</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"> {{ucfirst($category->name)}}</option>
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
                                    <input type="text" class="form-control simplebox" name="exchange" placeholder="What are you exchanging it for?" required>

                                    @if ($errors->has('exchange'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('exchange') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('state_id') ? ' has-error' : '' }}">

                                <div class="col-sm-12">
                                    <select class="form-control simplebox" name="state_id" required>
                                        <option value=""> -- Select state --</option>
                                        @foreach($states as $state)
                                            <option value="{{$state->id}}"> {{ucfirst($state->name)}}</option>
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
                                    <input type="text" class="form-control simplebox" name="address" placeholder="Additional address e.g street name">

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

                                <div class="col-sm-12">
                                    <textarea class="form-control simplebox" name="description" placeholder="Describe product(Optional)" rows="2"></textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="col-sm-12 bg-white p-20 shadow">
                            <div class="row form-group">
                                @for ($x = 0; $x < 4; $x++)
                                    <div class="col-sm-6 upload-container">
                                        <div class="col-sm-12">
                                            <div class="file-upload">
                                                {{--<img  class="advert-image img-responsive">--}}
                                                <button type="button" class="btn btn-danger remove-img hidden simplebox" data-file-index="">x</button>
                                                <input type="file" class="upload product-image-input" name="images[]" accept="image/*"/>
                                            </div>
                                        </div>
                                    </div>

                                @endfor

                                <div class="clearfix"></div>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="clearfix"></div>

            <div class="form-group mt-5">
                <div class="col-sm-12 mb-5">
                    <button type="submit" class="btn btn-danger simplebox">
                        Submit
                    </button>
                </div>
            </div>

        </form>

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
