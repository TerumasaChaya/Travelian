@extends('admin.elements.basic')

@section('title')
    共有記
@endsection

@section('content-header')

    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Report Travels</h1>
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
                            @foreach($reports as $report)
                                <tr>
                                    <td>
                                        @if($report->travels->releaseFlg == true)
                                            <a href="/admin/travel/public/{{$report->id}}">
                                                {{$report->travels->name}}
                                            </a>
                                        @else
                                            <a href="/admin/travel/private/{{$report->id}}">
                                                {{$report->travels->name}}
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/admin/users/{{$report->travels->users->id}}">
                                            {{$report->travels->users->name}}
                                        </a>
                                    </td>
                                    <td>{{$report->travels->genres->name}}</td>
                                    <td>
                                        <img src="{{action(ImageController::class.'@thumbnailImage',['name' => $report->travels->thumbnail])}}"
                                             class="img-responsive" style="margin-bottom:30px;">
                                    </td>
                                    <td>{{$report->travels->prefecture}}</td>
                                    <td>{{$report->travels->comment}}</td>
                                    <td>{{$report->travels->created_at}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="text-right">
                {!! $reports->render() !!}
            </div>
        </div>
@endsection
