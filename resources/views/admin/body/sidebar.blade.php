@php
    $prefix = Request::route()->getprefix();
    $route = Request::route()->getname();
@endphp

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{route('dashboard')}}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
                        <h3><b>My</b> School</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{($route == 'dashboard') ? 'active' : ''}}">
                <a href="{{url('dashboard')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{($prefix == '/users') ? 'active' : ''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Manage User</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('user.view')}}"><i class="ti-more"></i>View User</a></li>
                    <li><a href="{{route('user.add')}}"><i class="ti-more"></i>Add User</a></li>
                </ul>
            </li>
            <li class="treeview {{($prefix == '/profile') ? 'active' : ''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Manage Profile</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('profile.view')}}"><i class="ti-more"></i>Your Profile</a></li>
                    <li><a href="{{route('password.view')}}"><i class="ti-more"></i>Change Password</a></li>
                </ul>
            </li>

            <li class="treeview {{($prefix == '/setup') ? 'active' : ''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Setup Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('student.class.view')}}"><i class="ti-more"></i>Student Classes</a></li>
                    <li><a href="{{route('student.year.view')}}"><i class="ti-more"></i>Student Years</a></li>
                    <li><a href="{{route('student.group.view')}}"><i class="ti-more"></i>Student Groups</a></li>
                    <li><a href="{{route('student.shift.view')}}"><i class="ti-more"></i>Student Shifts</a></li>
                    <li><a href="{{route('fee.category.view')}}"><i class="ti-more"></i>Fee Category</a></li>
                    <li><a href="{{route('fee.amount.view')}}"><i class="ti-more"></i>Fee Amount</a></li>

                </ul>
            </li>


        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
