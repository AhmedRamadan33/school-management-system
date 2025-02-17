<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{route('dashboard.parent')}}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Parent Dashboard</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>

                    </li>

                    <!-- menu item Final Degrees<-->
                    <li>
                        <a href="{{route('sons.index')}}">
                            <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">Final Degrees</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu item Classrooms-->
                    <li>
                        <a href="{{route('sonsQuizzes.index')}}">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">Quizzes Degrees</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu item Sections-->
                    <li>
                        <a href="{{route('sonFee.index')}}">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">Fees</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu item todo-->
                    <li>
                        <a href="{{route('sonAttendance.index')}}">
                            <i class="ti-menu-alt"></i><span class="right-nav-text">
                                Attendance Report</span> </a>
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
