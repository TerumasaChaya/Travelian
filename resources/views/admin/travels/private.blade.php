@extends('admin.elements.basic')

@section('title')
    共有記
@endsection

@section('content-header')

    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Private Travels</h1>
        </div>
        <!--End Page Header -->
    </div>

@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-danger">
                <div class="panel-heading ">
                    <i class="fa fa-lock fa-fw"></i>Travels
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="col-lg-2">Name</th>
                                <th class="col-lg-1">User Name</th>
                                <th class="col-lg-1">Genre</th>
                                <th class="col-lg-1">Thumbnail</th>
                                <th class="col-lg-1">Prefecture</th>
                                <th class="col-lg-3">Comment</th>
                                <th class="col-lg-3">Created Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($travels as $travel)
                                <tr>
                                    <td>
                                        <a href="/admin/travel/private/{{$travel->id}}">
                                            {{$travel->name}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/admin/users/{{$travel->users->id}}">
                                            {{$travel->users->name}}
                                        </a>
                                    </td>
                                    <td>{{$travel->genres->name}}</td>
                                    <td>
                                        <img src="{{action(ImageController::class.'@thumbnailImage',['name' => $travel->thumbnail])}}"
                                             class="img-responsive" style="margin-bottom:30px;">
                                    </td>
                                    <td>{{$travel->prefecture}}</td>
                                    <td>{{$travel->comment}}</td>
                                    <td>{{$travel->created_at}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="text-right">
                {!! $travels->render() !!}
            </div>
        </div>
@endsection
