<!-- Sidebar -->
<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="side-header side-content bg-white-op">
                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button"
                        data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times"></i>
                </button>
                <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                <a class="h5 text-white" href="{{route('home')}}">
                    <span class="h5 text-primary font-w600">M. Ali </span> <span class="h5 font-w600 sidebar-mini-hide">cloths & Garments</span>
                </a>
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="side-content">
                <ul class="nav-main">
                    <li>
                        <a href="{{route('admin.home')}}"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                    </li>
                    {{--<li class="nav-main-heading"><span class="sidebar-mini-hide">User Interface</span></li>--}}
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-rocket"></i><span
                                    class="sidebar-mini-hide">Supplier Management</span></a>
                        <ul>
                            <li>
                                <a href="{{route('admin.home')}}">Add Supplier</a>
                            </li>
                            <li>
                                <a href="{{route('admin.home')}}">Active Suppliers</a>
                            </li>
                            <li>
                                <a href="{{route('admin.home')}}">Inactive Suppliers</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bag"></i><span
                                    class="sidebar-mini-hide">Ledgers</span></a>
                        <ul>
                            <li>
                                <a href="{{route('admin.home')}}">Add Ledger</a>
                            </li>
                            <li>
                                <a href="{{route('admin.home')}}">Ledger Summary</a>
                            </li>
                            <li>
                                <a href="{{route('admin.home')}}">All Transections</a>
                            </li>
                            <li>
                                <a href="{{route('admin.home')}}">Trans Existing Ledger</a>
                            </li>
                            <li>
                                <a href="{{route('admin.home')}}">Filter Ledger</a>
                            </li>
                            <li>
                                <a href="{{route('admin.home')}}">Delete Ledger</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a target="_blank" href="http://localhost/phpmyadmin/db_export.php?db=ledger"><i class="si si-cloud-download"></i><span
                                    class="sidebar-mini-hide">Database Backup</span></a>
                    </li>
                </ul>
            </div>
            <!-- END Side Content -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>
<!-- END Sidebar -->