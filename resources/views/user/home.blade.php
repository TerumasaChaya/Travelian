@extends('user.elements.basic')

@section('title')
    共有記
@endsection

@section('content-header')
    <div class="jumbotron special">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 outline">
                    <h1>ようこそ！共有記へ！</h1>
                    <p>このサイトはアプリ共遊記と連携しています。</p>
                </div>
            </div>
        </div>
    </div>
    <aside class="social">
        <div class="social-button">
            <ul>

            </ul>
        </div>
    </aside>
    <!--END TITLE & BREADCRUMB PAGE-->
@endsection

@section('content')

    <!-- Containers
    ================================================== -->

    <section class="section section-default point">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 subtitle">
                    <h2>様々な機能が利用できます</h2>
                    <p>以下からお選びください。</p>
                </div>
                <div class="col-md-3 col-sm-6 point-box">
                    <div class="point-circle compass">
                        <a href="/user/group">
                            <i class="fa fa-user-circle"></i>
                        </a>
                    </div>
                    <span class="badge">{{\count(Auth::user()->groupMembers)}}</span>
                    <div class="point-description">
                        <h4>グループ</h4>
                        <p>自分が参加したグループを一覧で見ることができます</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 point-box">
                    <div class="point-circle replace">
                        <a href="/user/travel">
                            <i class="fa fa-train"></i>
                        </a>
                    </div>
                    <span class="badge">{{\count(Auth::user()->travels)}}</span>
                    <div class="point-description">
                        <h4>旅</h4>
                        <p>自分が参加した旅を一覧で見ることができます</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 point-box">
                    <div class="point-circle start">
                        <a href="/user/travel/search">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                    <span class="badge">{{\count(\App\Travel::where('releaseFlg',true)->get())}}</span>
                    <div class="point-description">
                        <h4>旅の検索</h4>
                        <p>公開されている旅を検索することができます</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 point-box">
                    <div class="point-circle japanese">
                        <span class="icon-jp"></span>
                    </div>
                    <div class="point-description">
                        <h4>Optimized Japanese</h4>
                        <p>本家Bootstrapでは指定されていない日本語フォントに関する指定が行われているため、美しく日本語を表示できます。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END CONTENT-->
@endsection

@section('page-js')
    <script type="text/javascript">

    </script>
@endsection