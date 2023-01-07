  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-dark border-bottom-0">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">

        </li>

           <!-- Notifications Dropdown Menu -->
           <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-danger navbar-badge">ds</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right overflow-hidden">
                <span class="dropdown-item dropdown-header">Notifikasi</span>

                <div class="dropdown-divider"></div>
                <a href="" class="dropdown-item">
                    <i class="fas
                    {{-- @switch($key)
                        @case('donatur') fa-user-plus text-warning @break
                        @case('subscriber') fa-user-plus text-secondary @break
                        @case('contact') fa-envelope text-info @break
                        @case('donation') fa-donate text-primary @break
                        @case('cashout') fa-hand-holding-usd text-success @break
                    @endswitch --}}
                    mr-2"></i> 45 baru
                    <span class="text-muted text-sm d-block">dsds</span>
                </a>

            </div>
        </li>


          <div class="collapse navbar-collapse" id="navbar-list-4">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="40" height="40" class="rounded-circle">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Dashboard</a>
                  <a class="dropdown-item" href="{{route('user.edit', Auth::user()->id)}}">Edit Profile</a>
                  <a class="dropdown-item" href="#"
                  onclick="document.querySelector('#form-logout').submit()">
                  <i class="fas fa-sign-out-alt"></i>Log Out</a>
                  <form action="{{ route('logout') }}" method="post" id="form-logout">
                    @csrf
                </form>
                </div>
              </li>
            </ul>
    </ul>
</nav>
  <!-- /.navbar -->
