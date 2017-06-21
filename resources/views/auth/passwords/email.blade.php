@extends('frontend.layouts.default')

<!-- Main Content -->
@section('content')
    <div class="col-sm-4 col-sm-offset-4 col-xs-12 p-20 shadow mt-30 bg-white">
        <h3 class="text-muted">Reset Password</h3>
        <hr>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-3 control-label">E-Mail Address</label>

                <div class="col-md-9">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email address" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">
                        Send Password Reset Link
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
