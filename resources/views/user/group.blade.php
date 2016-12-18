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
                <div class="bs-component">
                    @foreach($groupMembers as $group)
                        <div class="col-lg-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">{{$group->groups->name}}</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="list-group">
                                        @foreach(\App\GroupMember::where('group_id',$group->group_id)->get() as $group)
                                            <a href="#" class="list-group-item">
                                                @if($group->leaderFlg == 1)
                                                    <h4 class="list-group-item-text">
                                                        <i class="fa fa-user-circle fa-fw"></i>
                                                        {{$group->users->name}}
                                                    </h4>
                                                @else
                                                    <h4 class="list-group-item-text">
                                                        {{$group->users->name}}
                                                    </h4>
                                                @endif
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--END CONTENT-->
@endsection

@section('page-js')
    <script type="text/javascript">

    </script>
@endsection