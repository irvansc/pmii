<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
    data-kt-scroll-activate="true" data-kt-scroll-height="auto"
    data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
    data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
    <!--begin::Menu-->
    <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold px-3" id="#kt_app_sidebar_menu"
        data-kt-menu="true" data-kt-menu-expand="false">

        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                <span class="menu-icon">
                    <span class="svg-icon svg-icon-2">
                        <i class="bi bi-speedometer"></i>
                    </span>
                </span>
                <span class="menu-title">Dashboards</span>
            </a>
            <!--end:Menu link-->
        </div>
        @can('read setting')
        <div data-kt-menu-trigger="click"
            class="menu-item menu-accordion {{ Route::is('konfigurasi.*') ? ' hover show' : '' }}">
            <!--begin:Menu link-->
            <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs029.svg-->
                    <span class="svg-icon svg-icon-2">
                        <i class="bi bi-people-fill"></i>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">User Management</span>
                <span class="menu-arrow"></span>
            </span>
            <!--end:Menu link-->
            <!--begin:Menu sub-->
            <div class="menu-sub menu-sub-accordion {{ Route::is('konfigurasi.*') ? 'show' : '' }}"
                kt-hidden-height="124" style="">
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('konfigurasi.users-list.index') ? 'active' : '' }}"
                        href="{{ route('konfigurasi.users-list.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Users lists</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{ Route::is('konfigurasi.roles.*') ? 'hover show' : '' }}">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Roles</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion {{ Route::is('konfigurasi.roles.*') ? 'show' : '' }}">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ Route::is('konfigurasi.roles.*') ? 'active' : '' }}"
                                href="{{ route('konfigurasi.roles.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Roles List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->

                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('konfigurasi.permissions.index') ? 'active' : '' }}"
                        href="{{ route('konfigurasi.permissions.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Permissions</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            </div>
            <!--end:Menu sub-->
        </div>
        @endcan
        @can('read post')
        <div data-kt-menu-trigger="click"
            class="menu-item menu-accordion {{ Route::is('posts.*') ? ' hover show' : '' }}">
            <!--begin:Menu link-->
            <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs029.svg-->
                    <span class="svg-icon svg-icon-2">
                        <i class="bi bi-file-earmark-post"></i>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">Article Management</span>
                <span class="menu-arrow"></span>
            </span>
            <!--end:Menu link-->
            <!--begin:Menu sub-->
            <div class="menu-sub menu-sub-accordion {{ Route::is('posts.*') ? 'show' : '' }}" kt-hidden-height="124"
                style="">
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('posts.add-post') ? 'active' : '' }}"
                        href="{{ route('posts.add-post') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Add Posts</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('posts.all_posts') ? 'active' : '' }}"
                        href="{{ route('posts.all_posts') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">All Posts</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('posts.categories') ? 'active' : '' }}"
                        href="{{ route('posts.categories') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Categories</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            </div>
            <!--end:Menu sub-->
        </div>
        @endcan

        @can('read setting')
        <!--begin:Menu item-->
        <div class="menu-item pt-5">
            <!--begin:Menu content-->
            <div class="menu-content">
                <span class="menu-heading fw-bold text-uppercase fs-7">KATEGORI</span>
            </div>
            <!--end:Menu content-->
        </div>
        <!--end:Menu item-->
        <div data-kt-menu-trigger="click"
            class="menu-item menu-accordion {{ Route::is('setting.*') ? ' hover show' : '' }}">
            <!--begin:Menu link-->
            <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs029.svg-->
                    <span class="svg-icon svg-icon-2">
                        <i class="bi bi-bookmark-check-fill"></i>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">Kategori Management</span>
                <span class="menu-arrow"></span>
            </span>
            <!--end:Menu link-->
            <!--begin:Menu sub-->
            <div class="menu-sub menu-sub-accordion {{ Route::is('setting.*') ? 'show' : '' }}" kt-hidden-height="124"
                style="">
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('setting.home') ? 'active' : '' }}"
                        href="{{ route('setting.home') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Home page</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('setting.about') ? 'active' : '' }}"
                        href="{{ route('setting.about') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">About</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('setting.vm') ? 'active' : '' }}" href="{{ route('setting.vm') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Visi-Misi</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('setting.galery') ? 'active' : '' }}"
                        href="{{ route('setting.galery') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Galery</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('setting.folder') ? 'active' : '' }}"
                        href="{{ route('setting.folder') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Folder</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            </div>
            <!--end:Menu sub-->
        </div>
        @endcan

        <!--begin:Menu item-->
        <div class="menu-item pt-5">
            <!--begin:Menu content-->
            <div class="menu-content">
                <span class="menu-heading fw-bold text-uppercase fs-7">USERS</span>
            </div>
            <!--end:Menu content-->
        </div>
        <!--end:Menu item-->
        <div data-kt-menu-trigger="click"
            class="menu-item menu-accordion {{ Route::is('users.index') ? ' hover show' : '' }}">
            <!--begin:Menu link-->
            <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs029.svg-->
                    <span class="svg-icon svg-icon-2">
                        <i class="bi bi-person-bounding-box"></i>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">Users</span>
                <span class="menu-arrow"></span>
            </span>
            <!--end:Menu link-->
            <!--begin:Menu sub-->
            <div class="menu-sub menu-sub-accordion {{ Route::is('users.index') ? 'show' : '' }}" kt-hidden-height="124"
                style="">
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('users.index') ? 'active' : '' }}"
                        href="{{ route('users.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">user</span>
                    </a>
                    <!--end:Menu link-->
                </div>

                <!--end:Menu item-->
            </div>
            <!--end:Menu sub-->
        </div>
        <hr>
        @can('read setting')
        <div data-kt-menu-trigger="click"
            class="menu-item menu-accordion  {{ Route::is('jabatan-list') ? 'hover show' : '' }} || {{ Route::is('struktur') ? 'hover show' : '' }}">
            <!--begin:Menu link-->
            <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs029.svg-->
                    <span class="svg-icon svg-icon-2">
                        <i class="bi bi-person-badge"></i>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">Struktur Organisasi</span>
                <span class="menu-arrow"></span>
            </span>
            <!--end:Menu link-->
            <!--begin:Menu sub-->
            <div class="menu-sub menu-sub-accordion {{ Route::is('jabatan-list') ? 'show' : '' }} || {{ Route::is('struktur') ? 'show' : '' }}"
                kt-hidden-height="124" style="">
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('jabatan-list') ? 'active' : '' }}"
                        href="{{ route('jabatan-list') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Jabatan</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('struktur') ? 'active' : '' }}" href="{{ route('struktur') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Users Organisasi</span>
                    </a>
                    <!--end:Menu link-->
                </div>

            </div>
            <!--end:Menu sub-->
        </div>

        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ Route::is('inbox') ? 'active' : '' }}" href="{{ route('inbox') }}">
                <span class="menu-icon">
                    <span class="svg-icon svg-icon-2">
                        <i class="bi bi-chat"></i>
                    </span>
                </span>
                @php
                $in = DB::table('contacts')->where('isActive', '=', '0')->count()
                @endphp

                <span class="menu-title">Inbox
                    <span class="badge bg-danger rounded-pill" style="margin-left: 10px;">
                        {{ $in }}
                    </span>
                </span>
            </a>
            <!--end:Menu link-->
        </div>
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ Route::is('settings') ? 'active' : '' }}" href="{{ route('settings') }}">
                <span class="menu-icon">
                    <span class="svg-icon svg-icon-2">
                        <i class="bi bi-gear"></i>
                    </span>
                </span>
                <span class="menu-title">General Settings</span>
            </a>
            <!--end:Menu link-->
        </div>
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ Route::is('logs') ? 'active' : '' }}" href="{{ route('logs') }}">
                <span class="menu-icon">
                    <span class="svg-icon svg-icon-2">
                        <i class="bi bi-clock"></i>
                    </span>
                </span>
                <span class="menu-title">Logs</span>
            </a>
            <!--end:Menu link-->
        </div>
        @endcan
        <!--end:Menu item-->
    </div>
    <!--end::Menu-->
</div>
