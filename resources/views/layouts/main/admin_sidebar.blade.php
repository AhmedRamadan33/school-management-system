<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Admin
                                    Dashboard</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>

                    </li>

                    <!-- menu item Grades-->
                    <li>
                        <a href="{{ route('grades.index') }}">
                            <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">Grades</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu item Classrooms-->
                    <li>
                        <a href="{{ route('classrooms.index') }}">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">Classrooms</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu item Sections-->
                    <li>
                        <a href="{{ route('sections.index') }}">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">Sections</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu item todo-->
                    <li>
                        <a href="{{ route('teachers.index') }}"><i class="ti-menu-alt"></i><span class="right-nav-text">
                                Teachers</span> </a>
                    </li>
                    <!-- menu item chat-->
                    <li>
                        <a href="{{ route('parents.index') }}"><i class="ti-comments"></i><span
                                class="right-nav-text">Parents
                            </span></a>
                    </li>
                    <!-- menu item mailbox-->
                    <li>
                        <a href="{{ route('students.index') }}"><i class="ti-email"></i><span
                                class="right-nav-text">Students
                            </span> </a>
                    </li>
                    <!-- menu item Charts-->
                    <li>
                        <a href="{{ route('promotion.index') }}" data-toggle="collapse" data-target="#promotion">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">Promotion</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="promotion" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('promotion.index') }}">index</a></li>
                            <li><a href="{{ route('promotion.create') }}">create</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('graduated.index') }}" data-toggle="collapse" data-target="#Form">
                            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">
                                    Graduate</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Form" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('graduated.index') }}">index</a></li>
                            <li><a href="{{ route('graduated.create') }}">create</a></li>
                        </ul>
                    </li>
                    <!-- menu item table -->
                    <li>
                        <a href="{{ route('subjects.index') }}">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">
                                    Subjects</span></div>
                            <div class="clearfix"></div>
                        </a>

                    </li>

                    <!-- menu item Fees-->
                    <li>
                        <a href="{{ route('fees.index') }}" data-toggle="collapse" data-target="#Fees">
                            <div class="pull-left"><i class="ti-id-badge"></i><span class="right-nav-text">Fees</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Fees" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('fees.index') }}">index</a></li>
                            <li><a href="{{ route('fees.create') }}">create</a></li>

                        </ul>
                    </li>

                    <!-- menu item Fees-->
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#Accounts">
                            <div class="pull-left"><i class="ti-id-badge"></i><span class="right-nav-text">Students
                                    Accounts</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Accounts" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('receipts.index') }}">receipts</a></li>
                            <li><a href="{{ route('payments.index') }}">payments</a></li>
                            <li><a href="{{ route('processingFee.index') }}">processing Fees</a></li>
                        </ul>
                    </li>

                    <!-- menu item maps-->
                    <li>
                        <a href="{{ route('library.index') }}"><i class="ti-location-pin"></i><span
                                class="right-nav-text">Library</span>
                        </a>
                    </li>
                    <!-- menu item timeline-->
                    <li>
                        <a href="#"><i class="ti-panel"></i><span class="right-nav-text">timeline</span>
                        </a>
                    </li>

                    <!-- menu item Profile-->
                    <li>
                        <a href="{{ route('profile.index') }}"><i class="ti-email"></i><span
                                class="right-nav-text">Profile
                            </span> </a>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
