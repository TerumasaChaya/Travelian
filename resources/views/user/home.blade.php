@extends('user.elements.basic')

@section('title')
    共遊記
@endsection

@section('content')

    <!-- Containers
    ================================================== -->

    <div class="fh5co-hero">
        <div class="fh5co-overlay"></div>
        <div class="fh5co-cover" data-stellar-background-ratio="0.5"
             style="background-image: url(/travel/images/title01.png);">

            <div class="desc">
                <div class="container">
                    <div class="row">
                        <div class="desc2 animate-box fadeInUp animated">
                            <div class="col-sm-7 col-sm-push-1 col-md-7 col-md-push-1">
                                <h2>ようこそ！共遊記へ！</h2>
                                <p>このサイトはアプリ"共遊記"と連携しています。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-tours" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box fadeInUp animated">
                    <h3>Hot Trips</h3>
                    <p>今、最も注目されている旅。</p>
                </div>
            </div>
            <div class="row">
                @foreach(\App\Travel::where('releaseFlg',true)->orderBy('travelPoint','DESC')->limit(4)->get() as $popTravel)
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
                                   href="/user/travel/release/detail/{{ $popTravel->id}}">
                                    詳細を見る
                                    <i class="icon-arrow-right22"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-12 text-center animate-box fadeInUp animated">
                    <p><a class="btn btn-primary btn-outline btn-lg" href="/user/travel/search">他の旅を探しますか? <i
                                    class="icon-arrow-right22"></i></a></p>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-destination">
        <div class="tour-fluid">
            <div class="row">
                <div class="col-md-12">
                    <ul id="fh5co-destination-list" class="animate-box fadeInUp animated">
                        <li class="one-forth text-center" style="background-image: url({{action(ImageController::class.'@travelImage',['name' => $popularGenre[0]['photo']])}}); ">
                            <a href="/user/genre/detail/{{$popularGenre[0]['id']}}">
                                <div class="case-studies-summary">
                                    <h2>{{$popularGenre[0]['name']}}</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center" style="background-image: url({{action(ImageController::class.'@travelImage',['name' => $popularGenre[1]['photo']])}}); ">
                            <a href="/user/genre/detail/{{$popularGenre[1]['id']}}">
                                <div class="case-studies-summary">
                                    <h2>{{$popularGenre[1]['name']}}</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center" style="background-image: url({{action(ImageController::class.'@travelImage',['name' => $popularGenre[2]['photo']])}}); ">
                            <a href="/user/genre/detail/{{$popularGenre[2]['id']}}">
                                <div class="case-studies-summary">
                                    <h2>{{$popularGenre[2]['name']}}</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center" style="background-image: url({{action(ImageController::class.'@travelImage',['name' => $popularGenre[3]['photo']])}}); ">
                            <a href="/user/genre/detail/{{$popularGenre[3]['id']}}">
                                <div class="case-studies-summary">
                                    <h2>{{$popularGenre[3]['name']}}</h2>
                                </div>
                            </a>
                        </li>

                        <li class="one-forth text-center" style="background-image: url({{action(ImageController::class.'@travelImage',['name' => $popularGenre[4]['photo']])}}); ">
                            <a href="/user/genre/detail/{{$popularGenre[4]['id']}}">
                                <div class="case-studies-summary">
                                    <h2>{{$popularGenre[4]['name']}}</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-half text-center">
                            <div class="title-bg">
                                <div class="case-studies-summary">
                                    <h2>Most Popular Genres</h2>
                                     <span><a href="/user/travel/search">旅を検索しますか？</a></span>
                                </div>
                            </div>
                        </li>
                        <li class="one-forth text-center" style="background-image: url({{action(ImageController::class.'@travelImage',['name' => $popularGenre[5]['photo']])}}); ">
                            <a href="/user/genre/detail/{{$popularGenre[5]['id']}}">
                                <div class="case-studies-summary">
                                    <h2>{{$popularGenre[5]['name']}}</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center" style="background-image: url({{action(ImageController::class.'@travelImage',['name' => $popularGenre[6]['photo']])}}); ">
                            <a href="/user/genre/detail/{{$popularGenre[6]['id']}}">
                                <div class="case-studies-summary">
                                    <h2>{{$popularGenre[6]['name']}}</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center" style="background-image: url({{action(ImageController::class.'@travelImage',['name' => $popularGenre[7]['photo']])}}); ">
                            <a href="/user/genre/detail/{{$popularGenre[7]['id']}}">
                                <div class="case-studies-summary">
                                    <h2>{{$popularGenre[7]['name']}}</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center" style="background-image: url({{action(ImageController::class.'@travelImage',['name' => $popularGenre[8]['photo']])}}); ">
                            <a href="/user/genre/detail/{{$popularGenre[8]['id']}}">
                                <div class="case-studies-summary">
                                    <h2>{{$popularGenre[8]['name']}}</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center" style="background-image: url({{action(ImageController::class.'@travelImage',['name' => $popularGenre[9]['photo']])}}); ">
                            <a href="/user/genre/detail/{{$popularGenre[9]['id']}}">
                                <div class="case-studies-summary">
                                    <h2>{{$popularGenre[9]['name']}}</h2>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
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