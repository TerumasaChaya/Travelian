@extends('admin.elements.basic')

@section('title')
    共有記
@endsection

@section('content-header')

    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Private Details</h1>
        </div>
        <!--End Page Header -->
    </div>

@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-picture-o fa-fw"></i>Private Details
                </div>
                <div class="panel-body">
                    <div id="google-map">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-js')

    <script>

        var map;
        var marker = [];
        var infoWindow = [];
        var markerData = [
                @foreach ($details as $detail)
            {
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
            map = new google.maps.Map(document.getElementById('google-map'), { // #sampleに地図を埋め込む
                center: mapLatLng, // 地図の中心を指定
                zoom: 15 // 地図のズームを指定
            });

            // マーカー毎の処理
            for (var i = 0; i < markerData.length; i++) {
                markerLatLng = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']}); // 緯度経度のデータ作成
                marker[i] = new google.maps.Marker({ // マーカーの追加
                    position: markerLatLng, // マーカーを立てる位置を指定
                    map: map // マーカーを立てる地図を指定
                });

                infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
                    content: '<div class="google-map">' + markerData[i]['name'] + '</div>' // 吹き出しに表示する内容
                });

                markerEvent(i); // マーカーにクリックイベントを追加
            }

            marker[0].setOptions({// TAM 東京のマーカーのオプション設定
                icon: {
                    url: markerData[0]['icon']// マーカーの画像を変更
                }
            });
        }

        // マーカーにクリックイベントを追加
        function markerEvent(i) {
            marker[i].addListener('click', function () { // マーカーをクリックしたとき
                infoWindow[i].open(map, marker[i]); // 吹き出しの表示
            });
        }

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVZIvgXJfefqwyagKk5H_1Cbd8J2T4dEU&callback=initMap"></script>

@endsection
