@extends('admin.elements.basic')

@section('title')
    共有記
@endsection

@section('content-header')

    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Photos</h1>
        </div>
        <!--End Page Header -->
    </div>

@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-picture-o fa-fw"></i>Photos
                </div>
                <div class="panel-body">
                    @foreach($travels as $travel)
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <img src="{{action(ImageController::class.'@travelImage',['name' => $travel->photo])}}"
                                 class="img-responsive" style="margin-bottom:30px;">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="text-right">
                {!! $travels->render() !!}
            </div>
        </div>
    </div>
@endsection
