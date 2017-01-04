@extends('frontend.layouts.default')
@section('content')
    <div class="col-sm-4 col-sm-offset-4 p-20 shadow mt-50 bg-white">
                    <h3 class="text-muted">My Account</h3>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-sm-12">
                                <input id="email" type="email" class="form-control simplebox input-lg" name="email" value="{{ old('email') }}" placeholder="E-mail address" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-sm-12">
                                <input id="password" type="password" class="form-control simplebox input-lg" name="password" placeholder="Your password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-danger simplebox input-lg">
                                    Sign in
                                </button>

                                <a class="btn text-muted" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
@endsection