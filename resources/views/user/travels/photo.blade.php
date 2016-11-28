@extends('user.elements.basic')

@section('title')
    共有記
@endsection

@section('content-header')

@endsection
@section('content')
    <section class="section section-inverse point">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <i class="fa fa-picture-o fa-fw"></i>旅写真
                        </div>
                        <div class="panel-body">
                            <img src="{{action(ImageController::class.'@travelImage',['name' => $detail->photo])}}"
                                 class="img-responsive">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <i class="fa fa-info-circle fa-fw"></i>写真情報
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>旅名</label>
                                        <a href="/user/travel/{{$detail->travels->id}}">
                                            <input class="form-control" value="{{$detail->travels->name}}" readonly>
                                        </a>
                                </div>
                                <div class="col-lg-6">
                                    <label>ユーザー名</label>
                                        <input class="form-control" value="{{$detail->travels->users->name}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>住所</label>
                                    <input class="form-control"
                                           value="{{$location->prefecture.$location->city.$location->town}}"
                                           readonly
                                    >
                                </div>
                            </div>
                            <div class="col-lg-12">

                                <div class="form-group">
                                    <label>経度</label>
                                    <input class="form-control"
                                           value="{{$location->x}}"
                                           readonly
                                    >
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>緯度</label>
                                    <input class="form-control"
                                           value="{{$location->y}}"
                                           readonly
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-center">
                            <i class="fa fa-copyright fa-fw"></i>HeartRails Geo API
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-js')


@endsection