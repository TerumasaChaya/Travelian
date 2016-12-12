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
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="panel panel-warning">
                <div class="panel-heading ">
                    <i class="fa fa-tag fa-fw"></i>Genres
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="col-lg-6">Name</th>
                                <th class="col-lg-3">Point</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($genres as $genre)
                                <tr>
                                    <td>
                                        {{$genre->name}}
                                    </td>
                                    <td>{{$genre->genrePoint}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="text-center">
                {!! $genres->render() !!}
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <form role="form" method="POST" id="confirm"
                  action="/admin/genres/confirm">
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
                                           value=""
                                    >
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Genre Kana Name</label>
                                    <input class="form-control" name="kana_name"
                                           value=""
                                    >
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit"
                                        class="btn btn-outline btn-warning btn-lg btn-block">
                                    Gerne Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

@endsection
