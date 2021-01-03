




<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Panel</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin_index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>


            <li class="nav-item">
                <a class="nav-link" href="{{route('Subscriber.index')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Subscribers</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.package.index')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Packages</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.ticket.index')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tickets</span></a>
            </li>
    <!-- Nav Item - Pages Collapse Menu -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card">
                <img class="sidebar-card-illustration mb-2" src="{{asset('admin/img/undraw_rocket.svg')}}" alt="">
                <p class="text-center mb-2"><strong>Admin Dash panel</strong> is packed with premium features, components, and more!</p>
            </div>

        </ul>
