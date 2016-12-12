@extends('admin.elements.basic')

@section('title')
    共有記
@endsection

@section('content-header')

    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Genres</h1>
        </div>
        <!--End Page Header -->
    </div>

@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form role="form" method="POST" id="confirm"
                  action="/admin/genres/complete">
                {{csrf_field()}}
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <i class="fa fa-tag fa-fw"></i>Add Gerne
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Genre Name</label>
                                    <input class="form-control" name="name"
                                           value="{{$name}}"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Genre Kana Name</label>
                                    <input class="form-control" name="kana_name"
                                           value="{{$kana_name}}"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit"
                                        class="btn btn-outline btn-warning btn-lg btn-block">
                                    OK?
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

@endsection
