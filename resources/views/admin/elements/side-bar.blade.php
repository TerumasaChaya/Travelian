@section('side-bar')


    <!-- navbar side -->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <!-- sidebar-collapse -->
        <div class="sidebar-collapse">
            <!-- side-menu -->
            <ul class="nav" id="side-menu">
                <li>
                    <!-- user image section-->
                    <div class="user-section">
                        <div class="user-section-inner">
                            <img src="/assets/img/user.jpg" alt="">
                        </div>
                        <div class="user-info">
                            <div><strong>Admin</strong></div>
                            <div class="user-text-online">
                                <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                            </div>
                        </div>
                    </div>
                    <!--end user image section-->
                </li>
                <li>
                    <a href="/admin/home"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                </li>
                <li>
                    <a href="/admin/users"><i class="fa fa-user fa-fw"></i>Users</a>
                </li>
                <li>
                    <a href="/admin/travel/public"><i class="fa fa-unlock fa-fw"></i>Public Travels</a>
                </li>
                <li>
                    <a href="/admin/travel/private"><i class="fa fa-lock fa-fw"></i>Private Travels</a>
                </li>
                <li>
                    <a href="/admin/photos"><i class="fa fa-file fa-fw"></i>Photos</a>
                </li>
                <li>
                    <a href="/admin/genres"><i class="fa fa-tag fa-fw"></i>Genres</a>
                </li>
            </ul>
            <!-- end side-menu -->
        </div>
        <!-- end sidebar-collapse -->
    </nav>
    <!-- end navbar side -->

@endsection