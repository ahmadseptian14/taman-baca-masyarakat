<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">Kadigi</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>

    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

    </form>
    @if (Auth::user()->roles == 'ANGGOTA')
        <a href="{{ route('peminjaman.pay') }}" style="margin-right: 60%; text-decoration:none"
            class="btn btn-sm btn-success">Donasi</a>
    @endif

    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">

        @if (Auth::user()->roles == 'ANGGOTA')
            <li class="nav-item">
                <a class="nav-link " href="{{ route('keranjang.index') }}">
                    @php
                        $keranjangs = \App\Models\Keranjang::where('users_id', Auth::user()->id)->count();
                    @endphp
                    @if ($keranjangs > 0)
                        <button type="button" class="btn btn-primary position-relative">
                            <i class="fas fa-shopping-cart fa-fw"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $keranjangs }}
                            </span>
                        </button>
                    @else
                        <i class="fas fa-shopping-cart fa-fw"></i>
                    @endif
                </a>
            </li>
        @endif

        <li class="nav-item">
            <h5 class="nav-link">{{ Auth::user()->name }}</h5>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"><img src="{{ asset(Auth::user()->foto) }}"
                    alt="" width="25px" style="border-radius: 50%"></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"">Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <li><a href="{{ route('edit.password') }}" class="dropdown-item">Ubah Password</a></li>
            </ul>
        </li>
    </ul>
</nav>
