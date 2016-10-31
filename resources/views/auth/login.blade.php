@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h1 class="well">User Login</h1>
    <div class="col-lg-12 well">
        <div class="row">

            <div class="col-sm-6 form-group">
                <label>Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email..">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-sm-6 form-group">
                <label>Password</label>
                <input id="password" type="password" class="form-control" name="password" placeholder="Password..">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 text-center">
                <button type="button" class="btn btn-block btn-info">Login</button>
            </div>
        </div>
        <div class="or-text">
            <div class="or-text-row">
                <div class="or-text-line">
                    <button type="button" class="btn btn-default btn-circle" disabled="disabled">or</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary"><i class="fa fa-facebook"></i>Sign in with Facebook</button>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="btn-group">
                    <button type="button" class="btn btn-danger"><i class="fa fa-google-plus"></i>Sign in with GooglePlus</button>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="btn-group">
                    <button type="button" class="btn btn-info"><i class="fa fa-linkedin"></i>Sign in with Linkedin</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
