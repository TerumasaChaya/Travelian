@extends('admin.elements.basic')

@section('title')
    共有記
@endsection

@section('content-header')

    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Photo</h1>
        </div>
        <!--End Page Header -->
    </div>

@endsection
@section('content')
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <i class="fa fa-picture-o fa-fw"></i>Photo
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
                    <i class="fa fa-info-circle fa-fw"></i>Photo Info
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
                        <form role="form" method="POST" id="delete" action="{{ url('admin/photos/delete') }}">
                            <input name="id" type="hidden" value="{{$detail->id}}">
                            {{csrf_field()}}
                            <button type="button" id="send" class="btn btn-outline btn-danger btn-lg btn-block">Photo Delete</button>
                        </form>
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

    <script type="text/javascript">


        $(document).on('click', '#send', function(){
            $('#delete').submit();
        });
    </script>

@endsection