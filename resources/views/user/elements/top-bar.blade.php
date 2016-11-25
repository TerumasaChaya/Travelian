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
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{Auth::user()->name}}
                                <small>さん</small>
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/logout">
                                        ログアウト
                                    </a></li>
                            </ul>
                        </li>
                        <li><a href="#">リンク</a></li>
                        <li><a href="#">リンク</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

@endsection