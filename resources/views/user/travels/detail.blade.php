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
                <div class="col-lg-5 col-md-5 col-sm-5">
                    @if($travel->releaseFlg == true)
                        <div class="panel panel-primary">
                            @else
                                <div class="panel panel-lock">
                                    @endif
                                    <div class="panel-heading">
                                        <i class="fa fa-picture-o fa-fw"></i>マップ
                                    </div>
                                    <div class="panel-body">
                                        <div id="google-maps" class="google-maps">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7">
                            @if($travel->releaseFlg == true)
                                <div class="panel panel-primary">
                                    @else
                                        <div class="panel panel-lock">
                                            @endif

                                            <div class="panel-heading">
                                                <i class="fa fa-info-circle fa-fw"></i>旅情報
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" method="POST" id="confirm"
                                                      action="/user/travel/confirm">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="id" value="{{$travel->id}}">
                                                    <div class="form-group">
                                                        <div class="col-lg-6">
                                                            <label>旅名</label>
                                                            <input class="form-control" name="name"
                                                                   value="{{$travel->name}}">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>ユーザー名</label>
                                                            <input class="form-control" value="{{$travel->users->name}}"
                                                                   readonly>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label>ジャンル</label>
                                                                <select name="genre" class="form-control">
                                                                    @foreach(\App\Genre::all() as $genre)
                                                                        @if($genre->id == $travel->genre_id)
                                                                        <option value="{{$genre->id}}"
                                                                                label="{{$genre->name}}" selected>
                                                                            {{$genre->name}}
                                                                        </option>
                                                                        @else
                                                                            <option value="{{$genre->id}}"
                                                                                    label="{{$genre->name}}">
                                                                                {{$genre->name}}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label>コメント</label>
                                                                <textarea class="form-control"
                                                                          name="comment">{{$travel->comment}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label>Point</label>
                                                                <input class="form-control"
                                                                       value="{{$travel->travelPoint}}"
                                                                       readonly
                                                                >
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label>投稿日時</label>
                                                                <input class="form-control"
                                                                       value="{{$travel->created_at}}"
                                                                       readonly
                                                                >
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label>旅の公開設定</label>
                                                                <select name="release" class="form-control" id="release">
                                                                    <option value="1" label="公開">
                                                                        公開
                                                                    </option>
                                                                    <option value="0" label="非公開">
                                                                        非公開
                                                                    </option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <button type="button" id="send"
                                                                    class="btn btn-outline btn-success btn-lg btn-block">
                                                                更新する
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                </div>
                        </div>
                </div>
    </section>
    <!--END CONTENT-->
@endsection

@section('page-js')
    <script type="text/javascript">

        var map;
        var marker = [];
        var polyline = [];
        var markerData = [
                @foreach ($details as $detail)
            {
                id: {{$detail['id']}},
                name: "{{ $detail['name'] }}",
                lat: {{ $detail['lat'] }},
                lng: {{ $detail['lng'] }},
                icon: "{{ $detail['icon'] }}"
            },
            @endforeach
        ];

        function initMap() {

            // 地図の作成
            var mapLatLng = new google.maps.LatLng({
                lat: Number(markerData[0]['lat']),
                lng: Number(markerData[0]['lng'])
            }); // 緯度経度のデータ作成
            map = new google.maps.Map(document.getElementById('google-maps'), { // #sampleに地図を埋め込む
                center: mapLatLng, // 地図の中心を指定
                zoom: 12 // 地図のズームを指定
            });

            // マーカー毎の処理
            for (var i = 0; i < markerData.length; i++) {

                polyline[i] = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']});

                if (markerData[i]['icon'] == "") {
                    markerLatLng = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']}); // 緯度経度のデータ作成
                    marker[i] = new google.maps.Marker({ // マーカーの追加
                        position: markerLatLng, // マーカーを立てる位置を指定
                        map: map // マーカーを立てる地図を指定
                    });
                } else {
                    var image = {
                        url: "{{Request::root()}}" + "/image/travelImage/" + markerData[i]['icon'],// マーカーの画像
                        // This marker is 20 pixels wide by 32 pixels high.
                        scaledSize: new google.maps.Size(25, 50)
                    };

                    markerLatLng = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']}); // 緯度経度のデータ作成
                    marker[i] = new google.maps.Marker({ // マーカーの追加
                        position: markerLatLng, // マーカーを立てる位置を指定
                        map: map,// マーカーを立てる地図を指定
                        icon: image
                    });
                }
                markerEvent(i); // マーカーにクリックイベントを追加
            }
            var flightPath = new google.maps.Polyline({
                path: polyline,
                strokeColor: "#FF0000",
                strokeOpacity: 1.0,
                strokeWeight: 2
            });
            flightPath.setMap(map);
        }

        // マーカーにクリックイベントを追加
        function markerEvent(i) {
            if (markerData[i]['icon'] == "") {
                marker[i].addListener('click', function () { // マーカーをクリックしたとき
                    window.location.href = "/user/travel/detail/" + markerData[i]['id'];
                });
            } else {
                marker[i].addListener('click', function () { // 画像をクリックしたとき
                    window.location.href = "/user/photos/" + markerData[i]['id'];
                });
            }
        }

        $(document).on('click', '#send', function () {
            $('#confirm').submit();
        });

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVZIvgXJfefqwyagKk5H_1Cbd8J2T4dEU&callback=initMap"></script>

    <script>
        $(function() {
            var flg =  {{$travel->releaseFlg}};

            if(flg == 1){
                $("#release").val("1");
            }else{
                $("#release").val("0");
            }

        });
    </script>

@endsection