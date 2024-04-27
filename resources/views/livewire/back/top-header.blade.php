<div>
    <div class="dropdown dropdown-menu-end">
        <a href="#" class="user-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="label">
                <span></span>
                <div>{{ $user->name }}</div>
            </div>
            <img class="img-user" src="@if ($user->profile == null)
            /back/img/user/person.png
            @else
            {{ $user->profile->picture }}
            @endif" alt="user" srcset="">
        </a>
        <ul class="dropdown-menu small">
            <!-- <li class="menu-header">
                <a class="dropdown-item" href="#">Notifikasi</a>
            </li> -->
            <li class="menu-content ps-menu">
                <a href="{{ route('users.edit', $user->username) }}">
                    <div class="description">
                        <i class="ti-user"></i> Profile
                    </div>
                </a>
                <a href="#">
                    <div class="description">
                        <i class="ti-settings"></i> Setting
                    </div>
                </a>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="description">
                        <i class="ti-power-off"></i> Logout
                    </div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
