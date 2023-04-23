<div class="row d-flex justify-content-between">
<link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet">
    <div class="col-md-3">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h3>Admin Dashboard</h3>
            </div>
            <ul class="sidebar-menu">
                <li class="{{ Request::is('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}">
                        <i class="fa fa-home"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::is('/data_tonase*') ? 'active' : '' }}">
                    <a href="{{ route('data_tonase.index') }}">
                        <i class="fa fa-database"></i> <span>Data Tonase</span>
                    </a>
                </li>
                <li class="{{ Request::is('kas_uj*') ? 'active' : '' }}">
                    <a href="{{ route('kas_uj.index') }}">
                        <i class="fa fa-uang"></i> <span>Kas Uang Jalan</span>
                    </a>
                </li>
                <li class="{{ Request::is('kategori*') ? 'active' : '' }}">
                    <a href="{{ route('kategori.index') }}">
                        <i class="fa fa-kategori"></i> <span>Kategori</span>
                    </a>
                </li>
                <li class="{{ Request::is('kendaraan*') ? 'active' : '' }}">
                    <a href="{{ route('kendaraan.index') }}">
                        <i class="fa fa-kendaraan"></i> <span>Kendaraan</span>
                    </a>
                </li>
                <li class="{{ Request::is('muat_bongkar*') ? 'active' : '' }}">
                    <a href="{{ route('muat_bongkar.index') }}">
                        <i class="fa fa-muat_bongkar"></i> <span>Muat Bongkar</span>
                    </a>
                </li>
                <li class="{{ Request::is('namasopir*') ? 'active' : '' }}">
                    <a href="{{ route('namasopir.index') }}">
                        <i class="fa fa-namasopir"></i> <span>Daftar Sopir</span>
                    </a>
                </li>
                <li class="{{ Request::is('rekap*') ? 'active' : '' }}">
                    <a href="{{ route('rekap.index') }}">
                        <i class="fa fa-rekap"></i> <span>Rekap Mobil Kecil</span>
                    </a>
                </li>
                <li class="{{ Request::is('rekap_fuso*') ? 'active' : '' }}">
                    <a href="{{ route('rekap_fuso.index') }}">
                        <i class="fa fa-rekap_fuso"></i> <span>Rekap Fuso</span>
                    </a>
                </li>
                <li class="{{ Request::is('uang_jalan*') ? 'active' : '' }}">
                    <a href="{{ route('uang_jalan.index') }}">
                        <i class="fa fa-uang_jalan"></i> <span>Uang Jalan</span>
                    </a>
                </li>
                <li class="{{ Request::is('update_mobil*') ? 'active' : '' }}">
                    <a href="{{ route('update_mobil.index') }}">
                        <i class="fa fa-update_mobil"></i> <span>Update Mobil</span>
                    </a>
                </li>
            </ul>
        </aside>
    </div>
    <div class="col-md-9">
        <div class="ml-3">
            @yield('content')
        </div>
    </div>
</div>