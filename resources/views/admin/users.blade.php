@extends('admin.elements.basic')

@section('title')
    共有記
@endsection

@section('content-header')

    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
        <!--End Page Header -->
    </div>

@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-warning">
                <div class="panel-heading ">
                    <i class="fa fa-user fa-fw"></i>Users
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
            <div class="text-right">
                {!! $users->render() !!}
            </div>
        </div>
@endsection
