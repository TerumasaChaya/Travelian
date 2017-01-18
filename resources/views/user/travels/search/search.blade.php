@extends('user.elements.basic')

@section('title')
    共遊記
@endsection

@section('content-header')

    <!--END TITLE & BREADCRUMB PAGE-->
@endsection

@section('content')

    <!-- Containers
    ================================================== -->

    <div id="fh5co-tours" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xs-12 subtitle heading-section animate-box fadeInUp animated">
                    <h2>検索フォーム</h2>
                    <p>公開されている旅を検索することができます。</p>
                </div>
                <div class="col-lg-4 col-xs-12 subtitle heading-section animate-box fadeInUp animated">
                    <h2>人気ジャンル</h2>
                    <p>いまホットなジャンルです。</p>
                </div>
                <div class="col-lg-8 col-xs-12 animate-box fadeInDown animated">
                    <form class="form-horizontal" action="/user/travel/search/result" method="GET">
                        <fieldset>
                            <legend>検索フォーム</legend>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">キーワード</label>
                                <div class="col-lg-10">
                                    <input type="text" name="keyword" class="form-control" id="inputEmail"
                                           placeholder="検索したいキーワードを入力してください">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="select" class="col-lg-2 control-label">地域</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="pres" name="pres">
                                        <option value="" selected>指定しない</option>
                                        <option value="0">北海道</option>
                                        <option value="1">東北</option>
                                        <option value="2">関東</option>
                                        <option value="3">中部</option>
                                        <option value="4">近畿</option>
                                        <option value="5">中国</option>
                                        <option value="6">四国</option>
                                        <option value="7">九州</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="select" class="col-lg-2 control-label">都道府県</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="region" name="region">
                                        <option value="" selected>指定しない</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="select" class="col-lg-2 control-label">ジャンル</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="genre" name="genre">
                                        <option value="" selected>指定しない</option>
                                        @foreach(\App\Genre::all() as $genre)
                                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="submit" class="btn btn-outline btn-success btn-block">検索</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-lg-4 col-xs-12 animate-box fadeInDown animated">
                    <form class="form-horizontal">
                        <fieldset>
                            <legend>Top 5</legend>
                            <div class="form-group">
                                <table class="table table-striped table-hover genre">
                                    <tbody>
                                    <tr class="danger">
                                        <td class="text-center">{{$popGenre[0]->name}}</td>
                                    </tr>
                                    <tr class="warning">
                                        <td class="text-center">{{$popGenre[1]->name}}</td>
                                    </tr>
                                    <tr class="active">
                                        <td class="text-center">{{$popGenre[2]->name}}</td>
                                    </tr>
                                    <tr class="success">
                                        <td class="text-center">{{$popGenre[3]->name}}</td>
                                    </tr>
                                    <tr class="info">
                                        <td class="text-center">{{$popGenre[4]->name}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--END CONTENT-->
@endsection

@section('page-js')
    <script type="text/javascript">

        var pres = [
            "北海道",
            "東北",
            "関東",
            "中部",
            "近畿",
            "中国",
            "四国",
            "九州"
        ];

        var region = [
            [
                '北海道'
            ],
            [
                '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県'
            ],
            [
                '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県'
            ],
            [
                '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県', '静岡県', '愛知県'
            ],
            [
                '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県'
            ],
            [
                '鳥取県', '島根県', '岡山県', '広島県', '山口県'
            ],
            [
                '徳島県', '香川県', '愛媛県', '高知県'
            ],
            [
                '福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'
            ]

        ];

        $("#pres").change(function () {

            var selectVal = $("#pres").val();
            $('#region > option').remove();

            $("#region").append($("<option>").val("").text("指定しない"));

            region[selectVal].forEach(function (val) {
                $("#region").append($("<option>").val(val).text(val));
            });

        });

    </script>

    <script>

        $(function() {
            $('.genre td').click(function(event){
                var genre = $(event.currentTarget.innerHTML).selector;
                var select = $('#genre').children();
                for( var i=0; i<select.length; i++ ){
                    if ( genre == select.eq(i).text() ) {
                        $('#genre').val(select.eq(i).val());
                    }
                }
            });
        });

    </script>

@endsection