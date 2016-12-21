@extends('layouts.app')

<!-- Main Content -->
@section('content')

    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="page-icon-shadow animated bounceInDown"></div>
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                        <i class="glyphicon glyphicon-question-sign"></i>
                    </div>
                    <div class="login-logo">
                        <img src="/webImage/login-logo.png" alt="Company Logo">
                    </div>
                    <hr>
                    <div class="login-form">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                            {{ csrf_field() }}
                            <p>メールアドレスを入力すると<br>パスワードリセットのリンクが添付されたメールが送信されます</p>

                            <input id="email" type="email" class="input-field" name="email" value="{{ old('email') }}"
                                   required="">

                            <button type="submit" class="btn btn-login btn-reset">パスワードをリセット</button>

                        </form>
                    </div>
                    <div class="login-links">
                        <a href="/login">
                            アカウントをお持ちの方はこちら
                        </a>
                        <br>
                        <a href="/register">
                            アカウントをお持ちではありませんか？
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
