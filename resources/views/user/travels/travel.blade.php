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

    <section class="section section-inverse point">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 subtitle">
                    <h2>あなたの旅です</h2>
                    <p>写真をクリックすると情報を変更できます。</p>
                </div>
                @foreach($travels as $travel)
                    <div class="col-lg-4">
                        <div class="bs-component">
                            @if($travel->releaseFlg == true)
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-unlock fa-fw"></i>
                                        {{$travel->name}}
                                    </div>
                                    @else
                                        <div class="panel panel-lock">
                                            <div class="panel-heading">
                                                <i class="fa fa-lock fa-fw"></i>
                                                {{$travel->name}}
                                            </div>
                                            @endif
                                            <div class="panel-body">
                                                <a href="/user/travel/{{$travel->id}}">
                                                    <img src="{{action(ImageController::class.'@travelImage',['name' => $travel->thumbnail])}}"
                                                         class="img-responsive">
                                                </a>

                                            </div>
                                            <table class="table evaluation-point-table">
                                                <tbody>
                                                <tr>
                                                    <th><i class="fa fa-fw fa-paint-brush"></i> ジャンル</th>
                                                    <td>
                                                        {{$travel->genres->name}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><i class="fa fa-fw fa-refresh"></i> 旅範囲</th>
                                                    <td>
                                                        @foreach($travel->travelPrefectures as $prefecture)
                                                            {{$prefecture->prefectures->name}}
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><i class="fa fa-fw fa-magic"></i> ポイント</th>
                                                    <td>
                                                        {{$travel->travelPoint}}
                                                        ポイント
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><i class="fa fa-fw fa-magic"></i> 投稿日時</th>
                                                    <td>
                                                        {{$travel->created_at->format('Y年m月d日')}}
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
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
    </section>
    <!--END CONTENT-->
@endsection

@section('page-js')
    <script type="text/javascript">

    </script>
@endsection