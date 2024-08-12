<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
        <div class="pull-left image">
            <img src="admin/dist/img/dit_logo.png" class="" alt="User Image" />
        </div>
        <div class="pull-left info">
            <p>Administrator</p>

            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
        
        <li class="treeview">
            <a href="{{ route('dashboard') }}">
            <i class="fa fa-dashboard"></i> <span></span> MAIN NAVIGATION<i class="fa fa-angle-left pull-right"></i>
            </a>
            
        </li>

        <li class="treeview">
            <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Staff Section</span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li> <a href="{{ route('admin.staff_profile') }}"><i class="fa fa-user"></i> <span>Staff Profile Management</span></a></li>
            <li> <a href="{{ route('admin.staff_research') }}"><i class="fa fa-print"></i> <span>Project/Research</span></a></li>
            
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
            <i class="fa fa-users"></i> <span>Student Project</span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li><a href="{{ route('admin.csn_project') }}"><i class="fa fa-circle-o"></i>Computer System & Network</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Multimedia & Animation</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
            <i class="fa fa-users"></i> <span>Programme</span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li><a href="{{ route('admin.csn_programme') }}"><i class="fa fa-circle-o"></i>Computer System & Network</a></li>
            <li><a href="{{ route('admin.viewDMA') }}"><i class="fa fa-circle-o"></i>Multimedia & Animation</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('view_slider')}}">
            <i class="fa fa-picture-o"></i>
            <span>Home Slider Images</span>
            </a>
        </li>
        <li >
           
        </li>
        <li>
            <a href="{{ route('admin.manage_event') }}">
            <i class="fa fa-calendar"></i> <span>Event Section</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.edit_goals')}}">
            <i class="fa  fa-gears"></i><span>Manage Goals</span>
            </a>
        </li>
      

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>