@extends('admin.elements.basic')

@section('title')
    共有記
@endsection

@section('content-header')

    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Marker</h1>
        </div>
        <!--End Page Header -->
    </div>

@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            @if($detail->travels->releaseFlg == true)
                <div class="panel panel-primary">
            @else
                        <div class="panel panel-danger">
            @endif

                <div class="panel-heading">
                    <i class="fa fa-info-circle fa-fw"></i>Marker Info
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label>Travel Name</label>
                            @if($detail->travels->releaseFlg == true)
                                <a href="/admin/travel/public/{{$detail->travels->id}}">
                                    <input class="form-control" value="{{$detail->travels->name}}" readonly>
                                </a>
                            @else
                                <a href="/admin/travel/private/{{$detail->travels->id}}">
                                    <input class="form-control" value="{{$detail->travels->name}}" readonly>
                                </a>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label>User Name</label>
                            <a href="/admin/users/{{$detail->travels->users->id}}">
                                <input class="form-control" value="{{$detail->travels->users->name}}" readonly>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control"
                                   value="{{$location->prefecture.$location->city.$location->town}}"
                                   readonly
                            >
                        </div>
                    </div>
                    <div class="col-lg-12">

                        <div class="form-group">
                            <label>Longitude</label>
                            <input class="form-control"
                                   value="{{$location->x}}"
                                   readonly
                            >
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Latitude</label>
                            <input class="form-control"
                                   value="{{$location->y}}"
                                   readonly
                            >
                        </div>
                    </div>
                    <div class="col-lg-12">
                        @if($detail->travels->releaseFlg == true)
                            <a href="/admin/travel/public/{{$detail->travels->id}}">
                                <button type="button" id="submit"
                                        class="btn btn-outline btn-danger btn-lg btn-block">Page Back
                                </button>
                            </a>
                        @else
                            <a href="/admin/travel/private/{{$detail->travels->id}}">
                                <button type="button" id="submit"
                                        class="btn btn-outline btn-danger btn-lg btn-block">Page Back
                                </button>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <i class="fa fa-copyright fa-fw"></i>HeartRails Geo API
                </div>
            </div>
        </div>
    </div>
@endsection
