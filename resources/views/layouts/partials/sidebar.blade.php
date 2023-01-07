<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('')}}vendor/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{Auth::user()->getPhoto()}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
       <li class="nav-item">
        <a href="{{ route('home') }}"
            class="nav-link {{ request()->is('home*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
        </a>
    </li>
    <li class="nav-header">Management User</li>
                <li class="nav-item has-treeview
                {{ Request::path() == 'user' ? 'menu-open' : '' }}
                ">
                    <a href="#" class="nav-link {{ Request::path() == 'user' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('user.index')}}" class="nav-link {{Request::path() == 'user' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Users</p>
                            </a>
                        </li>

                    </ul>
                </li>
    <li class="nav-header">Management Roles</li>

                <li class="nav-item has-treeview
                {{ Request::path() == 'roles' ? 'menu-open' : '' }}
                ">
                    <a href="#" class="nav-link {{ Request::path() == 'roles' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-key"></i>
                        <p>
                            R & P
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('roles.index')}}" class="nav-link {{Request::path() == 'roles' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>



{{-- <div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Management Users</span>
                </li>
                <li class="{{ request()->is('home*') ? 'active' : '' }}">
<a href="{{route('home')}}"><i class="fa fa-bars"></i> <span>Dashboard</span></a>
</li>

<li class="submenu
               {{ Request::path() == 'user'
                ||Request::path() == '' ? 'active' : '' }}
                ">
    <a href="#"><i class="fas fa-users"></i> <span> Users</span> <span class="menu-arrow"></span></a>
    <ul>
        <li><a href="{{route('user.index')}}"
                class="{{ Request::path() == 'user'|| Request::path() == '' ? 'active' : '' }}">List Users</a></li>

    </ul>
</li>

<li class="submenu
                {{ Request::path() == 'roles'
                 ||Request::path() == '' ? 'active' : '' }}
                 ">
    <a href="#"><i class="fa fa-universal-access"></i> <span> Roles & Permissions</span> <span
            class="menu-arrow"></span></a>
    <ul>
        <li><a href="{{route('roles.index')}}"
                class="{{ Request::path() == 'roles'|| Request::path() == '' ? 'active' : '' }}><i class=" fa
                fa-chevron-right"></i> Roles</a></li>
    </ul>
</li>

<li class="menu-title">
    <span>Management Artikel</span>
</li>
<li class="submenu">
    <a href="#"><i class="fa fa-newspaper"></i> <span> Artikel</span> <span class="menu-arrow"></span></a>
    <ul>
        <li><a href="students.html"><i class="fa fa-chevron-right"></i> Artikel</a></li>
        <li><a href="students.html"><i class="fa fa-chevron-right"></i> Buat Artikel</a></li>

    </ul>
</li>
<li><a href="students.html"><i class="fas fa-tasks"></i> Kategori</a></li>
<li class="menu-title">
    <span>Management Organisasi</span>
</li>
<li class="submenu">
    <a href="#"><i class="fe fe-triangle"></i> <span> Organisasi</span> <span class="menu-arrow"></span></a>
    <ul>
        <li><a href="fees-collections.html"><i class="fa fa-chevron-right"></i> Pmii</a></li>
        <li><a href="expenses.html"><i class="fa fa-chevron-right"></i> Kopri</a></li>
    </ul>
</li>
<li class="menu-title">
    <span>Management FrontEnd</span>
</li>

<li>
    <a href="holiday.html"><i class="fas fa-calendar-day"></i> <span>Agenda</span></a>
</li>
<li>
    <a href="fees.html"><i class="fa fa-bullhorn"></i> <span>Pengumuman</span></a>
</li>
<li>
    <a href="exam.html"><i class="fa fa-bullhorn"></i> <span>Galeri</span></a>
</li>
<li>
    <a href="event.html"><i class="fas fa-download"></i> <span>Download</span></a>
</li>
<li class="menu-title">
    <span>Management</span>
</li>

<li>
    <a href="holiday.html"><i class="fa fa-inbox"></i> <span>Kotak Masuk</span></a>
</li>
<li>
    <a href="fees.html"><i class="fas fa-user-plus"></i> <span>Subscriber</span></a>
</li>
<li class="menu-title">
    <span>Management Web</span>
</li>

<li>
    <a href="holiday.html"><i class="fas fa-cogs"></i> <span>Setting</span></a>
</li>
<li>
    <a href="fees.html"><i class="fa fa-fire"></i> <span>SEO</span></a>
</li>
</ul>
</li>
</ul>
</div>
</div>
</div> --}}
