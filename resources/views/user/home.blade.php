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
                    <p>下記のメニューから様々な機能が利用できます。</p>
                </div>
            </div>
        </div>
    </div>
    <!--
    <aside class="social">
        <div class="social-button">
            <ul>
            </ul>
        </div>
    </aside>
    -->
    <!--END TITLE & BREADCRUMB PAGE-->
@endsection

@section('content')

    <!-- Containers
    ================================================== -->

    <section class="section section-default point">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 point-box">
                        <div class="point-circle lightgreen">
                            <a href="/user/group">
                                <i class="fa fa-user-circle"></i>
                            </a>
                        </div>
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
                    <div class="point-description">
                        <h4>旅</h4>
                        <p>自分が参加した旅を一覧で見ることができます</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 point-box">
                    <div class="point-circle compass">
                        <i class="fa fa-github-alt"></i>
                    </div>
                    <div class="point-description">
                        <h4>Open Source</h4>
                        <p>作成に使用したSASSファイルは全て公開されています。変数の定義ファイルを変更することで自分好みの設定に変更することも可能です。</p>
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