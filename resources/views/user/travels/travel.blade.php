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
                @foreach($travels as $travel)
                    <div class="col-lg-6">
                        <div class="bs-component">
                            @if($travel->releaseFlg == true)
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-unlock fa-fw"></i>
                                        <h3 class="panel-title">{{$travel->name}}</h3>
                                    </div>
                                    @else
                                        <div class="panel panel-danger">
                                            <div class="panel-heading">
                                                <i class="fa fa-lock fa-fw"></i>
                                                <h3 class="panel-title">{{$travel->name}}</h3>
                                            </div>
                                            @endif
                                            <div class="panel-body">
                                                <div class="list-group">
                                                    <a href="/user/travel/{{$travel->id}}" class="list-group-item">
                                                        <img src="{{action(ImageController::class.'@travelImage',['name' => $travel->thumbnail])}}"
                                                             class="img-responsive">
                                                    </a>
                                                    <a href="#" class="list-group-item">
                                                        <p class="list-group-item-heading">ジャンル</p>
                                                        <h4 class="list-group-item-text">{{$travel->genres->name}}</h4>
                                                    </a>
                                                    <a href="#" class="list-group-item">
                                                        <p class="list-group-item-heading">旅範囲</p>
                                                        <h4 class="list-group-item-text">
                                                            @foreach($travel->travelPrefectures as $prefecture)
                                                                {{$prefecture->prefectures->name}}
                                                            @endforeach
                                                        </h4>
                                                    </a>
                                                    <a href="#" class="list-group-item">
                                                        <p class="list-group-item-heading">旅ポイント</p>
                                                        <h4 class="list-group-item-text">{{$travel->travelPoint}}
                                                            ポイント</h4>
                                                    </a>

                                                    <a href="#" class="list-group-item">
                                                        <p class="list-group-item-heading">コメント</p>
                                                        <h4 class="list-group-item-text">{{$travel->comment}}</h4>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                        </div>
                        @endforeach
                    </div>
            </div>
    </section>
    <!--END CONTENT-->
@endsection

@section('page-js')
    <script type="text/javascript">

    </script>
@endsection