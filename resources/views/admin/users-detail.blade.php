@extends('admin.elements.basic')

@section('title')
    共有記
@endsection

@section('content-header')

    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">User</h1>
        </div>
        <!--End Page Header -->
    </div>

@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <i class="fa fa-info-circle fa-fw"></i>User Info
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>User Name</label>
                        <input class="form-control" value="{{$user->name}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input class="form-control" value="{{$user->email}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Created Date</label>
                        <input class="form-control" value="{{$user->created_at}}" readonly>
                    </div>
                    <form role="form" method="POST" id="delete" action="{{ url('admin/users/delete') }}">
                        <input name="id" type="hidden" value="{{$user->id}}">
                        {{csrf_field()}}
                        <button type="button" id="send" class="btn btn-outline btn-danger btn-lg btn-block">
                            User Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @if($travels == "")

        @else
            @foreach($travels as $travel)
                <div class="col-lg-2 col-md-2 col-sm-2">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <i class="fa fa-picture-o fa-fw"></i>{{$travel->name}}
                        </div>
                        <div class="panel-body">
                            @if($travel->releaseFlg == true)
                                <a href="/admin/travel/public/{{$travel->id}}">
                                    <img src="{{action(ImageController::class.'@thumbnailImage',['name' => $travel->thumbnail])}}"
                                         class="img-responsive" style="margin-bottom:30px;">
                                </a>
                            @else
                                <a href="/admin/travel/private/{{$travel->id}}">
                                    <img src="{{action(ImageController::class.'@thumbnailImage',['name' => $travel->thumbnail])}}"
                                         class="img-responsive" style="margin-bottom:30px;">
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection

@section('page-js')

    <script type="text/javascript">

        $(document).on('click', '#send', function(){
            $('#delete').submit();
        });
    </script>

@endsection