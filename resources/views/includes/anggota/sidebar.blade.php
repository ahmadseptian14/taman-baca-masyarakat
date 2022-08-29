<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            {{-- <div class="sb-sidenav-menu-heading">Core</div> --}}

            @if (Auth::user()->roles == 'ADMIN')
            <a class="nav-link" href="{{route('dashboard.index')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            {{-- <div class="sb-sidenav-menu-heading">Interface</div> --}}
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Kategori Buku
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{route('kategori.index')}}">Lihat Kategori</a>
                    <a class="nav-link" href="{{route('kategori.create')}}">Tambah Kategori</a>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                TBM
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{route('tbm.index')}}">Lihat TBM</a>
                    <a class="nav-link" href="{{route('tbm.create')}}">Tambah TBM</a>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Pengurus
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{route('pengurus.index')}}">Lihat Pengurus</a>
                    <a class="nav-link" href="{{route('pengurus.create')}}">Tambah Pengurus</a>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Buku
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{route('buku.index')}}">Lihat Buku</a>
                    {{-- <a class="nav-link" href="{{route('buku.create')}}">Tambah Buku</a> --}}
                </nav>
            </div>
            @endif
          
            @if (Auth::user()->roles == 'PENGURUS')
            <a class="nav-link" href="{{route('dashboard.index')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Buku
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{route('buku.pengurus')}}">Lihat Buku</a>
                    <a class="nav-link" href="{{route('buku.create')}}">Tambah Buku</a>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Peminjaman
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{route('peminjaman.pengurus')}}">Lihat Peminjam</a>
                    <a class="nav-link" href="{{route('peminjaman.riwayat')}}">Riwayat Peminjaman</a>
                </nav>
            </div>
            @endif


            @if (Auth::user()->roles == 'ANGGOTA')
            {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Buku
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{route('buku.anggota')}}">Lihat Buku</a>
                    <a class="nav-link" href="{{route('peminjaman.index')}}">Daftar Pinjam</a>
                </nav>
            </div> --}}
           

            <li class="nav-item active">
                <a class="nav-link" href="{{route('peminjaman.index')}}">
                    <i class="fas fa-fw fa-list" style="margin-right: 5px"></i>
                    <span>Daftar Pinjam</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{route('buku.anggota')}}">
                    <i class="fas fa-fw fa-book" style="margin-right: 5px"></i>
                    <span>Lihat Buku</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('tbm.anggota')}}">
                    <i class="fas fa-fw fa-book" style="margin-right: 5px"></i>
                    <span>Lihat TBM</span></a>
            </li>
            @endif
            

            
        </div>
    </div>
</nav>