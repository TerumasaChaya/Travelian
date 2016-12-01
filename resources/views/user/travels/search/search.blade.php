@extends('user.elements.basic')

@section('title')
    共有記
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
                <div class="col-xs-8 subtitle heading-section animate-box fadeInUp animated">
                    <h2>検索フォームです</h2>
                    <p>公開されている旅を検索することができます。</p>
                </div>
                <div class="col-xs-4 subtitle heading-section animate-box fadeInUp animated">
                    <h2>人気ジャンル</h2>
                    <p>いまホットなジャンルです。</p>
                </div>
                <div class="col-lg-8 animate-box fadeInDown animated">
                    <form class="form-horizontal" action="/user/travel/search/result" method="POST">
                        {{csrf_field()}}
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
                                        <option value="" selected></option>
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
                                        <option value="" selected></option>
                                        <option value="北海道">北海道</option>
                                        <option value="青森県">青森県</option>
                                        <option value="岩手県">岩手県</option>
                                        <option value="宮城県">宮城県</option>
                                        <option value="秋田県">秋田県</option>
                                        <option value="山形県">山形県</option>
                                        <option value="福島県">福島県</option>
                                        <option value="茨城県">茨城県</option>
                                        <option value="栃木県">栃木県</option>
                                        <option value="群馬県">群馬県</option>
                                        <option value="埼玉県">埼玉県</option>
                                        <option value="千葉県">千葉県</option>
                                        <option value="東京都">東京都</option>
                                        <option value="神奈川県">神奈川県</option>
                                        <option value="新潟県">新潟県</option>
                                        <option value="富山県">富山県</option>
                                        <option value="石川県">石川県</option>
                                        <option value="福井県">福井県</option>
                                        <option value="山梨県">山梨県</option>
                                        <option value="長野県">長野県</option>
                                        <option value="岐阜県">岐阜県</option>
                                        <option value="静岡県">静岡県</option>
                                        <option value="愛知県">愛知県</option>
                                        <option value="三重県">三重県</option>
                                        <option value="滋賀県">滋賀県</option>
                                        <option value="京都府">京都府</option>
                                        <option value="大阪府">大阪府</option>
                                        <option value="兵庫県">兵庫県</option>
                                        <option value="奈良県">奈良県</option>
                                        <option value="和歌山県">和歌山県</option>
                                        <option value="鳥取県">鳥取県</option>
                                        <option value="島根県">島根県</option>
                                        <option value="岡山県">岡山県</option>
                                        <option value="広島県">広島県</option>
                                        <option value="山口県">山口県</option>
                                        <option value="徳島県">徳島県</option>
                                        <option value="香川県">香川県</option>
                                        <option value="愛媛県">愛媛県</option>
                                        <option value="高知県">高知県</option>
                                        <option value="福岡県">福岡県</option>
                                        <option value="佐賀県">佐賀県</option>
                                        <option value="長崎県">長崎県</option>
                                        <option value="熊本県">熊本県</option>
                                        <option value="大分県">大分県</option>
                                        <option value="宮崎県">宮崎県</option>
                                        <option value="鹿児島県">鹿児島県</option>
                                        <option value="沖縄県">沖縄県</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="select" class="col-lg-2 control-label">ジャンル</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="genre" name="genre">
                                        <option value="" selected></option>
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
                <div class="col-lg-4 animate-box fadeInDown animated">
                    <form class="form-horizontal">
                        <fieldset>
                            <legend>Top 5</legend>
                            <div class="form-group">
                                <table class="table table-striped table-hover ">
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

            $("#region").append($("<option>").val("").text(""));

            region[selectVal].forEach(function (val) {
                $("#region").append($("<option>").val(val).text(val));
            });

        });

    </script>
@endsection