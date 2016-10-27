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
    </section>
    <!--END CONTENT-->
@endsection

@section('page-js')
    <script type="text/javascript">

    </script>
@endsection