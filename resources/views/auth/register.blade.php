@extends('frontend.layouts.default')
@section('content')
    <div class="col-sm-4 col-sm-offset-4 col-xs-12 mt-30 p-20 shadow bg-white">
        <h3 class="text-muted">Create Account</h3>
        <hr>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                <div class="col-sm-12">
                    <input id="email" type="email" class="form-control simplebox" name="email" value="{{ old('email') }}" placeholder="Your email" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                <div class="col-sm-12">
                    <input id="password" type="password" class="form-control simplebox" name="password" placeholder="Choose password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">

                <div class="col-sm-12">
                    <input id="first_name" type="text" class="form-control simplebox" name="first_name" placeholder="First name" required>

                    @if ($errors->has('first_name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">

                <div class="col-sm-12">
                    <input id="first_name" type="text" class="form-control simplebox" name="last_name" placeholder="Last name" required>

                    @if ($errors->has('last_name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-danger simplebox">
                        Create account
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
