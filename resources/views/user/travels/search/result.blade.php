@extends('user.elements.basic')

@section('title')
    共遊記
@endsection

@section('content-header')

    <!--END TITLE & BREADCRUMB PAGE-->
@endsection

@section('content')

    <!-- Containers
    ================================================== -->

    <div id="fh5co-tours" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box fadeInUp animated">
                    <h3>検索結果</h3>
                    <p class="text-center">{{$keyMes}} <br>{{$genreMes}} <br> {{$regionMes}}</p>
                </div>
            </div>
            <div class="row">
                @foreach($travels as $popTravel)
                    <div class="col-md-6 col-sm-6 fh5co-tours animate-box fadeInUp animate"
                         data-animate-effect="fadeIn">
                        <div href="#" class="match"><img
                                    src="{{action(ImageController::class.'@travelImage',['name' => $popTravel->thumbnail])}}"
                                    class="img-responsive img-height">
                            <div class="desc">
                                <span></span>
                                <h3>{{ $popTravel->name}}</h3>
                                <span>{{ $popTravel->created_at->format('Y年m月d日')}}</span>
                                <a class="btn btn-primary btn-outline"
                                   href="/user/travel/release/detail/{{$popTravel->id}}">
                                    詳細を見る
                                    <i class="icon-arrow-right22"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                {!! $travels->render() !!}
            </div>
        </div>
    </div>

    <!--END CONTENT-->
@endsection

@section('page-js')
    <script type="text/javascript">

        $(window).on('load', function () {

            $('.match').matchHeight();

            $('.img-height').each(function () {
                var h = $(this).parent().height();
                $(this).height(h);
            });
        });

    </script>
@endsection