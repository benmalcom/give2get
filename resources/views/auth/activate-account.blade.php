@extends('frontend.layouts.default')
@section('content')
    <div class="col-sm-4 col-sm-offset-4 p-20 shadow mt-100 bg-white">
        <div class="col-sm-12 well well-sm simplebox">
            <h4 class="text-muted">Verify your account</h4>
            <p class="text-info text-muted">Enter the verification code sent to your mail</p>
        </div>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/activate-account') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('verification_code') ? ' has-error' : '' }}">

                <div class="col-sm-12">
                    <input id="email" type="text" class="form-control simplebox input-lg" name="verification_code" value="{{ old('verification_code') }}" placeholder="Activation code" required autofocus>

                    @if ($errors->has('verification_code'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('verification_code') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-danger simplebox input-lg">
                        Activate
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection