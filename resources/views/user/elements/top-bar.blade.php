@section('top-bar')
    <header>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="/" class="navbar-brand">共有記</a>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav">
                        <li><a href="/">Top</a></li>
                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{Auth::user()->name}}<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}">ログアウト</a></li>
                            </ul>
                        </li>
                        <li><a href="//github.com/windyakin/Honoka/releases">Download</a></li>
                        <li><a href="//github.com/windyakin/Honoka/wiki">Wiki</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
@endsection