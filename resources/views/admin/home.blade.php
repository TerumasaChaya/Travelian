@extends('admin.elements.basic')

@section('title')
    共有記
@endsection

@section('content-header')

    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">DashBoard</h1>
        </div>
        <!--End Page Header -->
    </div>

@endsection
@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="panel panel-primary text-center no-boder">
                <div class="panel-body yellow">
                    <a href="/admin/users">
                    <i class="fa fa-user fa-3x"></i>
                        </a>
                    <h3>{{count(\App\User::all())}}</h3>
                </div>
                <div class="panel-footer">
                            <span class="panel-eyecandy-title">
                                Users
                            </span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="panel panel-primary text-center no-boder">
                <div class="panel-body green">
                    <a href="/admin/travel/public">
                    <i class="fa fa-unlock fa-3x"></i>
                        </a>
                    <h3>{{count(\App\Travel::where('releaseFlg',true)->get())}}</h3>
                </div>
                <div class="panel-footer">
                            <span class="panel-eyecandy-title">
                                Public Travels
                            </span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="panel panel-primary text-center no-boder">
                <div class="panel-body red">
                    <a href="/admin/travel/private">
                    <i class="fa fa-lock fa-3x"></i>
                        </a>
                    <h3>{{count(\App\Travel::where('releaseFlg',false)->get())}}</h3>
                </div>
                <div class="panel-footer">
                            <span class="panel-eyecandy-title">
                                Private Travels
                            </span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="panel panel-primary text-center no-boder">
                <div class="panel-body blue">
                    <a href="/admin/photos">
                        <i class="fa fa-file fa-3x"></i>
                    </a>
                    <h3>{{count(\App\TravelDetail::where('photo','!=','')->get())}}</h3>
                </div>
                <div class="panel-footer">
                            <span class="panel-eyecandy-title">
                                Photos
                            </span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="panel panel-primary text-center no-boder">
                <div class="panel-body">
                    <a href="/admin/genres">
                        <i class="fa fa-tag fa-3x"></i>
                    </a>
                    <h3>{{count(\App\Genre::all())}}</h3>
                </div>
                <div class="panel-footer">
                            <span class="panel-eyecandy-title">
                                Genres
                            </span>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading ">
                    <i class="fa fa-user fa-fw"></i>New Users
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="col-lg-6">Name</th>
                                <th class="col-lg-3">Address</th>
                                <th class="col-lg-3">Created Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <a href="/admin/users/{{$user->id}}">
                                            {{$user->name}}
                                        </a>
                                    </td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($reports == null)
        @else
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-warning">
                    <div class="panel-heading ">
                        <i class="fa fa-user fa-fw"></i>New Reports
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="col-lg-6">Name</th>
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
                                        <td>{{$report->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
@endsection
