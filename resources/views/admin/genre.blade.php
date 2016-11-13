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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                                <th class="col-lg-3">Created Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($genres as $genre)
                                <tr>
                                    <td>
                                        {{$genre->name}}
                                    </td>
                                    <td>{{$genre->genrePoint}}</td>
                                    <td>{{$genre->created_at}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="text-right">
                {!! $genres->render() !!}
            </div>
        </div>
@endsection
