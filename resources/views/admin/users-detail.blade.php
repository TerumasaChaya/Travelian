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
        <div class="col-lg-6 col-lg-offset-3">
            <h1>User Info</h1>
            <form role="form">
                <fieldset disabled="disabled">
                    <div class="form-group">
                        <label for="disabledSelect">Name</label>
                        <input class="form-control" type="text" placeholder="{{$user->name}}" disabled="">
                    </div>
                    <div class="form-group">
                        <label for="disabledSelect">Address</label>
                        <input class="form-control"  type="text" placeholder="{{$user->email}}" disabled="">
                    </div>
                    <div class="form-group">
                        <label for="disabledSelect">Created Date</label>
                        <input class="form-control" type="text" placeholder="{{$user->created_at}}" disabled="">
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="col-lg-6 col-lg-offset-3">
            <button type="button" class="btn btn-outline btn-danger btn-lg btn-block">User Delete</button>
        </div>
    </div>

@endsection
