<nav class="main-sidebar ps-menu">
    <!-- <div class="sidebar-toggle action-toggle">
        <a href="#">
            <i class="fas fa-bars"></i>
        </a>
    </div> -->
    <!-- <div class="sidebar-opener action-toggle">
        <a href="#">
            <i class="ti-angle-right"></i>
        </a>
    </div> -->
    <div class="sidebar-header">
        <div class="text">{{ webInfo()->web_name }}</div>
        <div class="close-sidebar action-toggle">
            <i class="ti-close"></i>
        </div>
    </div>
    <div class="sidebar-content">
        <ul>
            <li class="{{ request()->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="link">
                    <i class="ti-dashboard"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="menu-category">
                <span class="text-uppercase">Konfigurasi</span>
            </li>
            @if (auth()->user() && auth()->user()->roles->pluck('name')->intersect(['admin', 'it'])->isNotEmpty())

            <li
                class="{{ Route::is('konfigurasi.*') ? 'active open' : '' }} || {{ request()->segment(1) == 'users' ? 'active open' : '' }} ">
                <a href="#" class="main-menu has-dropdown ">
                    <i class="ti-desktop"></i>
                    <span>KONFIRGURASI</span>
                </a>
                <ul
                    class="sub-menu {{ Route::is('konfigurasi.*') ? 'expand' : '' }} || {{ request()->segment(1) == 'users' ? 'expand' : '' }}">
                    <li class="{{ Route::is('konfigurasi.roles.index') ? 'active' : '' }}"><a
                            href="{{ route('konfigurasi.roles.index') }}" class="link"><span>Roles</span></a></li>
                    <li class="{{ Route::is('konfigurasi.permissions.index') ? 'active' : '' }}"><a
                            href="{{ route('konfigurasi.permissions.index') }}" class="link"><span>Permission</span></a>
                    </li>
                    <li class="{{ Route::is('users.index') ? 'active' : '' }}"><a href="{{ route('users.index') }}"
                            class="link"><span>Users</span></a></li>
                </ul>
            </li>

            @endif
            @if (auth()->user() && auth()->user()->roles->pluck('name')->intersect(['admin', 'author'])->isNotEmpty())

            <li
                class="{{ Route::is('posts.*') ? 'active open' : '' }} || {{ request()->segment(1) == 'users' ? 'active open' : '' }} ">
                <a href="#" class="main-menu has-dropdown ">
                    <i class="ti-desktop"></i>
                    <span>POSTS</span>
                </a>
                <ul class="sub-menu {{ Route::is('posts.*') ? 'expand' : '' }}">
                    <li class="{{ Route::is('posts.all_posts') ? 'active' : '' }}"><a
                            href="{{ route('posts.all_posts') }}" class="link"><span>Post</span></a></li>
                    <li class="{{ Route::is('posts.add-post') ? 'active' : '' }}"><a
                            href="{{ route('posts.add-post') }}" class="link"><span>Add Post</span></a></li>

                    <li class="{{ Route::is('posts.categories') ? 'active' : '' }}"><a
                            href="{{ route('posts.categories') }}" class="link"><span>Categories</span></a></li>
                </ul>
            </li>
            @endif
            @can('read setting')

            <li class="menu-category">
                <span class="text-uppercase">Kategori</span>
            </li>

            <li class="{{ Route::is('setting.*') ? 'active open' : '' }}">
                <a href="#" class="main-menu has-dropdown ">
                    <i class="ti-home"></i>
                    <span>KATEGORI</span>
                </a>
                <ul class="sub-menu {{ Route::is('setting.*') ? 'expand' : '' }}">
                    <li class="{{ Route::is('setting.home') ? 'active' : '' }}">
                        <a href="{{ route('setting.home') }}" class="link"><span>Home page</span></a>
                    </li>
                    <li class="{{ Route::is('setting.about') ? 'active' : '' }}">
                        <a href="{{ route('setting.about') }}" class="link"><span>About</span></a>
                    </li>

                    <li class="{{ Route::is('setting.vm') ? 'active' : '' }}">
                        <a href="{{ route('setting.vm') }}" class="link"><span>Visi Misi</span></a>
                    </li>
                    <li class="{{ Route::is('setting.galery') ? 'active' : '' }}">
                        <a href="{{ route('setting.galery') }}" class="link"><span>Galery</span></a>
                    </li>
                    <li class="{{ Route::is('setting.folder') ? 'active' : '' }}">
                        <a href="{{ route('setting.folder') }}" class="link"><span>Folder</span></a>
                    </li>

                </ul>
            </li>
            <li class="{{ request()->segment(1) == 'logs' ? 'active' : '' }}">
                <a href="{{ route('logs') }}" class="link" target="_blank">
                    <i class="ti-info-alt"></i>
                    <span>Logs</span>
                </a>
            </li>
            <li class="menu-category">
                <span class="text-uppercase">STRUKTUR ORGANISASI</span>
            </li>

            <li class="{{ Route::is('jabatan-list') ? 'active open' : '' }} || {{ Route::is('struktur') ? 'active open' : '' }}">
                <a href="#" class="main-menu has-dropdown ">
                    <i class=" ti-layout-grid2"></i>
                    <span>STRUKTUR</span>
                </a>
                <ul class="sub-menu {{ Route::is('jabatan-list') ? 'expand' : '' }} || {{ Route::is('struktur') ? 'expand' : '' }}">
                    <li class="{{ Route::is('jabatan-list') ? 'active' : '' }}">
                        <a href="{{ route('jabatan-list') }}" class="link"><span>Jabatan</span></a>
                    </li>
                    <li class="{{ Route::is('struktur') ? 'active' : '' }}">
                        <a href="{{ route('struktur') }}" class="link"><span>User Organisasi</span></a>
                    </li>

                </ul>
            </li>
            <li class="{{ request()->segment(1) == 'settings' ? 'active' : '' }}">
                <a href="{{ route('settings') }}" class="link">
                    <i class="ti-settings"></i>
                    <span>General Setting</span>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</nav>
