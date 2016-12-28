@extends('frontend.layouts.default')


@section('content')
    @include('frontend.layouts.partials.dashboard-menu')

    <div class="col-sm-10 col-sm-offset-1 mt-10 p-20 pt-20 bg-white shadow-lite">
        <div class="well well-sm col-sm-12 simplebox p-10">
            <h4>Change password</h4>
            <p class="text-muted text-warning"> <strong>*</strong> Enter your old and new password</p>
        </div>
        <form class="form-horizontal col-sm-6 col-sm-offset-3 mt-20" role="form" method="POST" action="{{ url('/change-password') }}" enctype="multipart/form-data">
            @include('frontend.layouts.partials.message')

                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                        <div class="col-sm-12">
                            <input type="text" class="form-control simplebox input-lg" name="current_password"  placeholder="Current password" autofocus>

                            @if ($errors->has('current_password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-sm-12">
                            <input type="text" class="form-control simplebox input-lg" name="password"  placeholder="New password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <div class="col-sm-12">
                            <input type="text" class="form-control simplebox input-lg" name="password_confirmation"  placeholder="Confirm new password">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-danger simplebox input-lg">
                            Submit
                        </button>
                    </div>
                </div>
        </form>

    </div>
@endsection