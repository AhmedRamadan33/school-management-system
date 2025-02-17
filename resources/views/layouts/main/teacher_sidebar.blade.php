<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{route('dashboard.teacher')}}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Teacher Dashboard</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>

                    </li>

                    <!-- menu item Charts-->
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#attendance">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">Attendance</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="attendance" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('attendance.index')}}">index</a></li>
                            <li><a href="{{route('attendance.history')}}">history</a></li>
                        </ul>
                    </li>

                    <!-- menu item Grades-->
                    <li>
                        <a href="{{route('quizzes.index')}}">
                            <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">Quizzes</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>

                    <!-- menu item Sections-->
                    <li>
                        <a href="{{route('onlineSessions.index')}}">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">Online Sessions</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu item todo-->
                    <li>
                        <a href="{{route('quizzesDegrees.index')}}">
                            <i class="ti-menu-alt"></i><span class="right-nav-text">
                                Quizzes Degrees</span> </a>
                    </li>
                    
                    <!-- menu item profile-->
                    <li>
                        <a href="{{ route('profile.index') }}"><i class="ti-panel"></i><span
                                class="right-nav-text">Profile
                            </span> </a>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
