@section('top-bar')

    <header id="fh5co-header-section" class="sticky-banner">
        <div class="container">
            <div class="nav-header">
                <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
                <h1 id="fh5co-logo"><a href="/home">共遊記</a></h1>
                <!-- START #fh5co-menu-wrap -->
                <nav id="fh5co-menu-wrap" role="navigation">
                    <ul class="sf-menu" id="fh5co-primary-menu">
                        <li><a href="/home">ホーム</a></li>
                        <li><a href="/user/group">グループ</a></li>
                        <li><a href="/user/travel">旅</a></li>
                        <li><a href="/user/travel/search">旅の検索</a></li>
                        <li>
                            <a class="fh5co-sub-ddown">{{mb_strimwidth(Auth::user()->name, 0, 10, "...")}}<span class="small">さん</span></a>
                            <ul class="fh5co-sub-menu">
                                <li><a href="/logout">ログアウト</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

@endsection