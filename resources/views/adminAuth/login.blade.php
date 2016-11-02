@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="well">Admin Login</h1>
        <div class="col-lg-12 well">
            <div class="row">
                <form role="form" method="POST" id="login" action="{{ url('admin/login') }}">
                    {{ csrf_field() }}
                    <div class="col-sm-6 form-group">
                        <label>Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                               placeholder="Email..">
                        @if ($errors->has('email'))
                            <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control" name="password"
                               placeholder="Password..">
                        @if ($errors->has('password'))
                            <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                        @endif
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-sm-12 text-center">
                    <button type="button" id="submit" class="btn btn-block btn-info">Login</button>
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
                <div class="col-sm-12 text-center">
                    <a href="/login">
                        <button type="button" class="btn btn-block btn-primary"><i class="fa fa-user-circle"></i>User
                            Account Login
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-footer')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#submit').click(function () {
                $('#login').submit();
            });
        });

    </script>

@endsection
