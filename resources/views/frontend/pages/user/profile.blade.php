@extends('frontend.layouts.default')


@section('content')
    @include('frontend.layouts.partials.dashboard-menu')

    <div class="col-sm-10 col-sm-offset-1 mt-10 p-20 pt-20 bg-white">
        @include('frontend.layouts.partials.message')
        <div class="well well-sm col-sm-12 simplebox p-10">
            <h4>Your profile</h4>
            <p class="text-muted text-warning"> <strong>*</strong> Edit your basic details. Your email cannot be changed again!</p>
        </div>
            <div class="row mt-20">
                <div class="col-sm-8">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile') }}" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control simplebox input-lg"  value="{{ $user->email }}" placeholder="Email" readonly>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <div class="col-sm-12">
                            <input type="text" class="form-control simplebox input-lg" name="first_name" value="{{ $user->first_name }}" placeholder="First name" autofocus>

                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <div class="col-sm-12">
                            <input type="text" class="form-control simplebox input-lg" name="last_name" value="{{ $user->last_name }}" placeholder="Last name">

                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                        <div class="col-sm-12">
                            <input type="text" class="form-control simplebox input-lg" name="mobile" value="{{ $user->mobile }}" placeholder="Mobile no">

                            @if ($errors->has('mobile'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12">

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger simplebox input-lg">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>

                </div>

                <div class="col-sm-4 p-0">
                    <form method="POST" action="{{ url('/profile/avatar') }}" enctype="multipart/form-data" class="col-sm-10 col-sm-offset-1">
                        {{ csrf_field() }}
                        <div class="form-group col-sm-12 mt-10 shadow p-0">
                            <img src="{{ !empty($user->avatar_url)  ?  $user->avatar_url : '/custom/img/no_photo_available.png'}}" class="img-responsive avatar shadow-lite">
                        </div>

                        <div class="from-group col-sm-12 mt-10 p-0">
                            <p>
                                <label class="btn btn-default btn-xs"><i class="fa fa-camera"></i> Choose photo<input type="file" name="avatar" class="hidden avatar-input"></label>
                                <button type="submit" class="btn btn-custom btn-xs simplebox">
                                    Upload
                                </button>
                            </p>
                        </div>
                    </form>

                </div>


            </div>

    </div>
@endsection