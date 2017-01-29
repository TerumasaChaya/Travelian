@extends('layouts.app')

@section('content')
    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="page-icon-shadow animated bounceInDown"></div>
                <div class="clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                        <i class="glyphicon glyphicon-sunglasses"></i>
                    </div>
                    <div class="login-logo">
                        <img src="/webImage/login-logo.png" alt="Company Logo">
                    </div>
                    <h4>
                        <span>
                            <u>1.　当社の名称等</u>
                            <u></u>
                        </span>
                    </h4>
                    <h5>
                        <span style="font-size:80%;">
                            名称：Travelial<br>
                            住所：〒530-0015 大阪府大阪市 北区中崎西2丁目3−35<br>
                            なお連絡先につきましては、下記の問い合わせ窓口の記載をご参照下さい。
                        </span>
                    </h5>
                    <h4>
                        <span>
                            <u>2.　取得する利用者情報</u>
                        </span>
                    </h4>
                    <h5>
                        <span style="font-size:80%;">
                            本アプリにおいて取得される利用者情報は、以下のとおりとします。
                        </span>
                    </h5>
                    <h6>
                        <span>
                            (1)利用者の端末の位置情報
                            <br/>
                            (2)利用者のメールアドレス
                        </span>
                    </h6>
                    <h4>
                        <span>
                            <u>3.　取得方法</u>
                        </span>
                    </h4>
                    <h5>
                        <span style="font-size:80%;">
                            本アプリにおける利用者情報の取得方法は、以下のとおりとします。
                        </span>
                    </h5>
                    <h6>
                        <span>
                            (1)アプリ側による自動取得
                            <br/>
                            (2)利用者による手入力
                            <br/>
                        </span>
                    </h6>
                    <h4>
                        <span>
                            <u>4.　利用目的</u>
                        </span>
                    </h4>
                    <h5>
                        <span style="font-size:80%;">
                            4-1　利用者情報は、4-2に定めるとおり本アプリのサービスのご提供のために利用されます。
                            <br/>
                            <br/>
                            4-2　本アプリのサービス提供にかかわる利用者情報の具体的な利用目的は以下のとおりです。
                        </span>
                    </h5>
                    <h6 style="margin-left: 40px;">
                        <span>
                            (1)　本アプリによる●のサービスをご提供するため
                            <br/>
                            (2)　本アプリに関するご案内、お問い合せ等への対応のため<br/>
                            (3)　本アプリに関する当社の規約、ポリシー等（以下「規約等」といいます。）に違反する行為に対する対応のため<br/>
                            (4)　本アプリに関する規約等の変更などを通知するため<br/>
                            (5)　上記の利用目的に付随する利用目的のため
                        </span>
                    </h6>
                    <h4>
                        <span>
                            <u>
                                5.　通知・公表又は同意取得の方法、利用者関与の方法
                            </u>
                        </span>
                    </h4>
                    <h5>
                        <span style="font-size:80%;">
                            5-1　以下の利用者情報については、その取得の処理が行われる前にお客様の同意を得るものとします。
                        </span>
                    </h5>
                    <h6 style="margin-left: 40px;">
                        <span>
                            (1)利用者の端末の位置情報
                        </span>
                    </h6>
                    <h5>
                        <span style="font-size:80%;">
                            5-2　お客様は、本アプリの所定の設定を行うことにより、利用者情報の全部又は一部について、その取得又は利用を中止させることができます。なお利用者情報の項目によっては、その取得又は利用が本アプリの動作の前提となるため、本アプリのアンインストールを行うことによってのみこれを中止できます。
                            <br/>
                            上記のほか、利用者情報が本ポリシーに反して取得又は取り扱われていることが判明した場合、下記お問い合わせ窓口へのお客様のお申出に基づき、利用者情報の利用の停止又は消去を行います。
                            <br/>
                            <br/>
                            5-3　5-1のご同意を頂けないこと、又は5-2の規定に基づく利用の中止等がなされたことにより、当社が利用者情報を取得又は利用できない場合には、当該利用者情報の利用が前提となる以下の機能はご利用頂けなくなります。
                        </span>
                    </h5>
                    <table border="1" cellspacing="1" cellpadding="1" style="width: 700px;">
                        <tbody>
                        <tr>
                            <td style="width: 350px;">
                                <h6>
                                    <span>
                                        　利用者情報
                                    </span>
                                </h6>
                            </td>
                            <td>
                                <h6>
                                    <span>
                                        　利用できなくなる機能
                                    </span>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6>
                                    <span>
                                        利用者の位置情報
                                    </span>
                                </h6>
                            </td>
                            <td>
                                <h6>
                                    <span>
                                        旅の記録、及び保存
                                    </span>
                                </h6>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <h4>
                        <span>
                            <u>
                                6.　取得された情報の公開、共有
                            </u>
                        </span>
                    </h4>
                    <h5>
                        <span style="font-size:80%;">
                            お客様が本アプリを公開設定で使用された場合には、本アプリにて取得したお客様の位置情報、メッセージに含まれるテキスト、写真等が本アプリを利用している全ての利用者が閲覧することができます。公開範囲は、旅の保存時、及び本サイトから変更することができます。
                        </span>
                    </h5>
                    <h4>
                        <span>
                            <u>
                                7.　お問い合わせ窓口
                            </u>
                        </span>
                    </h4>
                    <h5>
                        <span style="font-size:80%;">
                            ご意見、ご質問、苦情のお申出その他利用者情報の取扱いに関するお問い合わせは、下記の窓口までお願い致します。
                            <br/>
                            <br/>
                            E-mail：travelial2017@gmail.com
                            <br/>
                        </span>
                    </h5>
                    <h4>
                        <span>
                            <u>
                                8　プライバシーポリシーの変更手続
                            </u>
                        </span>
                    </h4>
                    <h5>
                        <span style="font-size:80%;">
                            当社は、利用者情報の取扱いに関する運用状況を適宜見直し、継続的な改善に努めるものとし、必要に応じて、本ポリシーを変更することがあります。変更した場合には、●の方法でお客様に通知いたします。また、第6項に定める第三者提供の提供先に変更が生じる場合には、お客様の同意を得るものとします。
                            <br/>
                            <br/>
                        </span>
                    </h5>
                    <h5 style="text-align: right;">
                        <span style="font-size:80%;">
                            【2017年1月29日制定】
                        </span>
                    </h5>
                    <h5>
                        <span style="font-size:80%;">
                            <br/>
                            <br/>
                            <br/>
                        </span>
                    </h5>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js-footer')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#submit').click(function () {
                $('#login').submit();
            });
        });

    </script>

@endsection