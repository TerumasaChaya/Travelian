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

    <div id="fh5co-blog-section" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box fadeInUp animated">
                    <h3>あなたの所属しているグループです</h3>
                    <p>写真をクリックすると情報を確認できます。</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row row-bottom-padded-md">
                <div class="col-sm-12 col-md-12">
                    <div class="tabulation animate-box fadeInUp animated">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#flights" aria-controls="flights" role="tab" id="release"
                                   data-toggle="tab">完了済みグループ</a>
                            </li>
                            <li role="presentation">
                                <a href="#hotels" aria-controls="hotels" role="tab" data-toggle="tab" id="hide">未完了のグループ</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane releaseTab active" id="flights">
                                <div class="row">
                                    @foreach($groupMembers as $groupMember)
                                        @if(\App\Travel::where('group_id',$groupMember->group_id)->first() != null)
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="fh5co-blog animate-box fadeInUp animated">
                                                    <a href="/user/group/detail/{{ \App\Travel::where('group_id',$groupMember->id)->first()->id}}"><img
                                                                class="img-responsive"
                                                                src="{{action(ImageController::class.'@travelImage',['name' => \App\Travel::where('group_id',$groupMember->id)->first()->thumbnail])}}"
                                                                alt=""></a>
                                                    <div class="blog-text-release">
                                                        <div class="prod-title">
                                                            <h3><a href="#"></a>{{ $groupMember->groups->name}}</h3>
                                                            @foreach(\App\GroupMember::where('group_id',$groupMember->group_id)->get() as $member)
                                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                                    @if($member->leaderFlg == true)
                                                                            <h4><i class="icon-user-tie"> </i>{{$member->users->name}}</h4>
                                                                    @else
                                                                           <h4> <i class="icon-user"> </i>{{$member->users->name}}</h4>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="clearfix visible-md-block">
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane hideTab" id="hotels">
                                <div class="row">
                                    @foreach($groupMembers as $groupMember)
                                        @if(\App\Travel::where('group_id',$groupMember->group_id)->first() == null)
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="fh5co-blog animate-box fadeInUp animated">
                                                    <div class="blog-text-release">
                                                        <div class="prod-title">
                                                            <h3><a href="#"></a>{{ $groupMember->groups->name}}</h3>
                                                            @foreach(\App\GroupMember::where('group_id',$groupMember->group_id)->get() as $member)
                                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                                    @if($member->leaderFlg == true)
                                                                        <h4><i class="icon-user-tie"> </i>{{$member->users->name}}</h4>
                                                                    @else
                                                                        <h4> <i class="icon-user"> </i>{{$member->users->name}}</h4>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="clearfix visible-md-block">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-js')
    <script type="text/javascript">

        (function ($) {
            var queries = (function () {
                var s = location.search.replace("?", ""),
                        query = {},
                        queries = s.split("&"),
                        i = 0;

                if (!s) return null;

                for (i; i < queries.length; i++) {
                    var t = queries[i].split("=");
                    query[t[0]] = t[1];
                }
                return query;
            })();

            $.queryParameter = function (key) {
                return (queries == null ? null : queries[key] ? queries[key] : null);
            };
        })(jQuery);

        $(function () {
            var type = $.queryParameter("type");

            if (type == "release") {

                var hideTitle = $('#hide');
                var releaseTitle = $('#release');

                hideTitle.parent().removeClass('active');
                releaseTitle.parent().addClass('active');

                hideTitle.attr('aria-expanded', 'false');
                releaseTitle.attr('aria-expanded', 'true');

                var hide = $('.hideTab');
                var release = $('.releaseTab');

                hide.removeClass('active');
                release.addClass('active');

            } else if (type == 'hide') {

                var hideTitle = $('#hide');
                var releaseTitle = $('#release');

                hideTitle.parent().addClass('active');
                releaseTitle.parent().removeClass('active');

                hideTitle.attr('aria-expanded', 'true');
                releaseTitle.attr('aria-expanded', 'false');

                var hide = $('.hideTab');
                var release = $('.releaseTab');

                hide.addClass('active');
                release.removeClass('active');

            }


        });

    </script>
@endsection