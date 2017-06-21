@extends('frontend.layouts.default')


@section('content')
    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>My account</li>
                </ul>

            </div>

            <div class="col-md-3">
                <!-- *** CUSTOMER MENU *** -->
                @include('frontend.layouts.partials.dashboard-menu')
                <!-- /.col-md-3 -->

                <!-- *** CUSTOMER MENU END *** -->
            </div>

            <div class="col-md-9">
                <div class="box">
                    <h1>My account</h1>
                    <p class="lead">Change your personal details or your avatar here.</p>

                    <h3>Update Details</h3>
                    <div class="row">
                        <div class="col-sm-8">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile') }}" enctype="multipart/form-data">

                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control simplebox"  value="{{ $user->email }}" placeholder="Email" readonly>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control simplebox" name="first_name" value="{{ $user->first_name }}" placeholder="First name" autofocus>

                                        @if ($errors->has('first_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control simplebox" name="last_name" value="{{ $user->last_name }}" placeholder="Last name">

                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control simplebox" name="mobile" value="{{ $user->mobile }}" placeholder="Mobile no">

                                        @if ($errors->has('mobile'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-12">

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger simplebox">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col-sm-4">
                            <div class="profile-sidebar">
                                <form method="POST" action="{{ url('/profile/avatar') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                            <!-- SIDEBAR USERPIC -->
                                    {{--<div class="profile-userpic">
                                        <img src="{{ !empty($user->avatar_url)  ?  $user->avatar_url : '/custom/img/no_photo_available.png'}}" class="img-responsive avatar br-4" style="border: 2px double darkgrey;" alt="">
                                    </div>--}}
                                    <div>
                                        <img src="{{ !empty($user->avatar_url)  ?  $user->avatar_url : '/custom/img/no_photo_available.png'}}" class="img-thumbnail  img-responsive" alt="">

                                    </div>
                                    <!-- END SIDEBAR USER PIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <!-- END SIDEBAR USER TITLE -->
                                    <!-- SIDEBAR BUTTONS -->
                                    <div class="profile-userbuttons"> <p>
                                            <label class="btn btn-default btn-xs"><i class="fa fa-camera"></i> Choose photo<input type="file" name="avatar" class="hidden avatar-input"></label>
                                            <button type="submit" class="btn btn-primary btn-xs simplebox">
                                                Upload
                                            </button>
                                        </p>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
        {{--<div class="row profile col-sm-10 col-sm-offset-1 mt-30">
            @include('frontend.layouts.partials.message')
            <div class="col-md-3">
                @include('frontend.layouts.partials.dashboard-menu')
            </div>
            <div class="col-md-9">
                <div class="profile-content">
                    <div class="well well-sm col-sm-12 simplebox p-10">
                        <h4>Your profile</h4>
                        <p class="text-muted text-warning"> <strong>*</strong> Edit your basic details. Your email cannot be changed again!</p>
                    </div>
                        <div class="col-sm-12">
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
                </div>
            </div>
        </div>
--}}
@endsection