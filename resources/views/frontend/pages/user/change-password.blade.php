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

                    <h3>Change password</h3>

                    <form class="form-horizontal mt-20" role="form" method="POST" action="{{ url('/change-password') }}" enctype="multipart/form-data">
                        @include('frontend.layouts.partials.message')

                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                            <div class="col-sm-12">
                                <input type="text" class="form-control simplebox" name="current_password"  placeholder="Current password" autofocus>

                                @if ($errors->has('current_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-sm-12">
                                <input type="text" class="form-control simplebox" name="password"  placeholder="New password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <div class="col-sm-12">
                                <input type="text" class="form-control simplebox" name="password_confirmation"  placeholder="Confirm new password">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-danger simplebox">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>

@endsection