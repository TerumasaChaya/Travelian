@section('top-bar')

    <header>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="/home" class="navbar-brand">共有記</a>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">{{Auth::user()->name}}</a></li>
                        <li><a href="#">リンク</a></li>
                        <li><a href="#">リンク</a></li>
                    </ul>

                    <div class="nav navbar-form navbar-right">
                        <div class="form-group">
                            <a href="/logout" class="btn btn-twitter"><i class="fa fa-twitter fa-lg"></i> ログアウト</a>
                    </div>

                </div>
            </div>
        </div>
    </header>

@endsection