<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{route('dashboard.student')}}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Student Dashboard</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>

                    </li>

                    <!-- menu item Exams-->
                    <li>
                        <a href="{{route('exams.index')}}">
                            <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">Exams</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu item Degrees-->
                    <li>
                        <a href="{{route('finalDegrees.index')}}">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">Final Degrees</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu item Sections-->
                    <li>
                        <a href="{{route('attendanceReport.index')}}">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">Attendance Report</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu item Student Info-->
                    <li>
                        <a href="{{route('studentInfo.index')}}">
                            <i class="ti-menu-alt"></i><span class="right-nav-text">
                                Student Info</span> </a>
                    </li>
                    <!-- menu item chat-->
                    <li>
                        <a href="{{route('studentSession.index')}}">
                            <i class="ti-comments"></i><span
                                class="right-nav-text">Online sessions
                            </span></a>
                    </li>

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
