@extends('layouts.app')

@section('content')

    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="page-icon-shadow animated bounceInDown"></div>
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </div>
                    <div class="login-logo">
                        <img src="/webImage/login-logo.png" alt="Company Logo">
                    </div>
                    <hr>
                    <div class="login-form">
                        <form role="form" method="POST" id="register" action="{{ url('/register') }}">
                            {{ csrf_field() }}
                            <input id="name" type="text" class="input-field" name="name" value="{{ old('name') }}"
                                   placeholder="ユーザー名" required="">
                            @if ($errors->has('name'))
                            <!-- Start Error box -->
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert"> ×</button>
                                    <h4>Error!</h4>
                                    {{ $errors->first('name') }}
                                </div>
                                <!-- End Error box -->
                            @endif
                            <input id="email" type="email" class="input-field" name="email" value="{{ old('email') }}"
                                   placeholder="Eメール" required="">
                            @if ($errors->has('email'))
                            <!-- Start Error box -->
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert"> ×</button>
                                    <h4>Error!</h4>
                                    {{ $errors->first('email') }}
                                </div>
                                <!-- End Error box -->
                            @endif
                            <input id="password" type="password" class="input-field" name="password"
                                   placeholder="パスワード" required=""/>
                            @if ($errors->has('password'))
                            <!-- Start Error box -->
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert"> ×</button>
                                    <h4>Error!</h4>
                                    {{ $errors->first('password') }}
                                </div> <!-- End Error box -->
                            @endif
                            <input id="password-confirm" type="password" class="input-field"
                                   name="password_confirmation"
                                   placeholder="パスワード確認" required="">
                            @if ($errors->has('password_confirmation'))
                            <!-- Start Error box -->
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert"> ×</button>
                                    <h4>Error!</h4>
                                    {{ $errors->first('password_confirmation') }}
                                </div> <!-- End Error box -->
                            @endif
                            <button type="submit" class="btn btn-login">ユーザー作成</button>
                        </form>
                    </div>
                    <div class="login-links">
                        <a href="/password/reset">
                            パスワードをお忘れですか？
                        </a>
                        <br>
                        <a href="/login">
                            アカウントをお持ちの方はこちら
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('js-footer')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#submit').click(function () {
                $('#register').submit();
            });
        });

    </script>

@endsection