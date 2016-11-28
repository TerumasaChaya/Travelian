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

    <section class="section section-inverse point">
        <div class="container">
            <div class="row">
                <div class="col-xs-8 subtitle">
                    <h2>あなたの旅です</h2>
                    <p>写真をクリックすると情報を変更できます。</p>
                </div>
                <div class="col-lg-8">
                    <div class="bs-component">
                        <form class="form-horizontal">
                            <fieldset>
                                <legend>検索フォーム</legend>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-lg-2 control-label">旅名</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="inputEmail" placeholder="検索したい旅名を入力してください">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="select" class="col-lg-2 control-label">地域</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" id="pres" name="pres">
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
                                            <option value="1">北海道</option>
                                            <option value="2">青森県</option>
                                            <option value="3">岩手県</option>
                                            <option value="4">宮城県</option>
                                            <option value="5">秋田県</option>
                                            <option value="6">山形県</option>
                                            <option value="7">福島県</option>
                                            <option value="8">茨城県</option>
                                            <option value="9">栃木県</option>
                                            <option value="10">群馬県</option>
                                            <option value="11">埼玉県</option>
                                            <option value="12">千葉県</option>
                                            <option value="13">東京都</option>
                                            <option value="14">神奈川県</option>
                                            <option value="15">新潟県</option>
                                            <option value="16">富山県</option>
                                            <option value="17">石川県</option>
                                            <option value="18">福井県</option>
                                            <option value="19">山梨県</option>
                                            <option value="20">長野県</option>
                                            <option value="21">岐阜県</option>
                                            <option value="22">静岡県</option>
                                            <option value="23">愛知県</option>
                                            <option value="24">三重県</option>
                                            <option value="25">滋賀県</option>
                                            <option value="26">京都府</option>
                                            <option value="27">大阪府</option>
                                            <option value="28">兵庫県</option>
                                            <option value="29">奈良県</option>
                                            <option value="30">和歌山県</option>
                                            <option value="31">鳥取県</option>
                                            <option value="32">島根県</option>
                                            <option value="33">岡山県</option>
                                            <option value="34">広島県</option>
                                            <option value="35">山口県</option>
                                            <option value="36">徳島県</option>
                                            <option value="37">香川県</option>
                                            <option value="38">愛媛県</option>
                                            <option value="39">高知県</option>
                                            <option value="40">福岡県</option>
                                            <option value="41">佐賀県</option>
                                            <option value="42">長崎県</option>
                                            <option value="43">熊本県</option>
                                            <option value="44">大分県</option>
                                            <option value="45">宮崎県</option>
                                            <option value="46">鹿児島県</option>
                                            <option value="47">沖縄県</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="textArea" class="col-lg-2 control-label">Textarea</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" rows="3" id="textArea"></textarea>
                                        <span class="help-block">ヘルプテキストは長くすることで1行を超えて分割されるようになります。</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Radios</label>
                                    <div class="col-lg-10">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                こっち
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                あっち
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button type="reset" class="btn btn-default">キャンセル</button>
                                        <button type="submit" class="btn btn-primary">送信</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END CONTENT-->
@endsection

@section('page-js')
    <script type="text/javascript">

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

        $("#pres").click( function(){
            var selectVal = $("#select_test").val();
            alert(region[selectVal]);
        });

    </script>
@endsection