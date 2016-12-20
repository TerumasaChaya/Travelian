@extends('admin.elements.basic')

@section('title')
    共有記
@endsection

@section('content-header')

    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">旅の詳細</h1>
        </div>
        <!--End Page Header -->
    </div>

@endsection
@section('content')
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <i class="fa fa-picture-o fa-fw"></i>Travel Map
                </div>
                <div class="panel-body">
                    <div id="google-maps" class="google-maps">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-7">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <i class="fa fa-info-circle fa-fw"></i>Travel Info
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label>Travel Name</label>
                            <input class="form-control" value="{{$travel->name}}" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label>User Name</label>
                            <a href="/admin/users/{{$travel->users->id}}">
                                <input class="form-control" value="{{$travel->users->name}}" readonly>
                            </a>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Comment</label>
                                <input class="form-control"
                                       value="{{$travel->comment}}"
                                       readonly
                                >
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Created Date</label>
                                <input class="form-control"
                                       value="{{$travel->created_at}}"
                                       readonly
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <i class="fa fa-copyright fa-fw"></i>HeartRails Geo API
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-js')

    <script>

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
            var mapLatLng = new google.maps.LatLng({lat: Number(markerData[0]['lat']), lng: Number(markerData[0]['lng'])}); // 緯度経度のデータ作成
            map = new google.maps.Map(document.getElementById('google-maps'), { // #sampleに地図を埋め込む
                center: mapLatLng, // 地図の中心を指定
                zoom: 12 // 地図のズームを指定
            });

            // マーカー毎の処理
            for (var i = 0; i < markerData.length; i++) {

                polyline[i] = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']});

                if (markerData[i]['icon'] != "") {
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
            if(markerData[i]['icon'] == ""){
                marker[i].addListener('click', function () { // マーカーをクリックしたとき
                    window.location.href = "/admin/travel/detail/"+ markerData[i]['id'];
                });
            }else{
                marker[i].addListener('click', function () { // マーカーをクリックしたとき
                    window.location.href = "/admin/photos/"+ markerData[i]['id'];
                });
            }
        }

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVZIvgXJfefqwyagKk5H_1Cbd8J2T4dEU&callback=initMap"></script>

@endsection
