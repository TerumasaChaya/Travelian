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
    <div class="bs-docs-section">

        <div class="row">
            <div class="col-lg-12">

                <div class="page-header">
                    <h1 id="container">あなたの所属グループ一覧</h1>
                </div>

                <div class="bs-component">
                    <div class="list-group">
                        @foreach($groupMembers as $group)
                            <a href="#" class="list-group-item">
                                {{$group->groups->name}}
                            </a>
                        @endforeach
                    </div>
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