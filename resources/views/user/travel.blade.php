@extends('user.elements.basic')

@section('title')
    共有記
@endsection

@section('content-header')

    <!--END TITLE & BREADCRUMB PAGE-->
@endsection

@section('content')

    <!-- Containers
    ================================================== -->

    <section class="section section-default point">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bs-component">
                        @foreach($travels as $travel)
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    {{$travel->genres->name}}
                                </a>
                                <a href="#" class="list-group-item">
                                    {{$travel->users->name}}
                                </a>
                                <a href="#" class="list-group-item">
                                    {{$travel->name}}
                                </a>
                                <a href="#" class="list-group-item">
                                    <img src="{{action(ImageController::class.'@travelImage',['name' => $travel->thumbnail])}}"
                                         class="img-responsive" height="200" width="200">
                                </a>
                                <a href="#" class="list-group-item">
                                    {{$travel->prefecture}}
                                </a>
                                <a href="#" class="list-group-item">
                                    {{$travel->travelPoint}}
                                </a>
                                <a href="#" class="list-group-item">
                                    {{$travel->comment}}
                                </a>
                                <a href="#" class="list-group-item">
                                    {{$travel->releaseFlg}}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END CONTENT-->
@endsection

@section('page-js')
    <script type="text/javascript">

    </script>
@endsection