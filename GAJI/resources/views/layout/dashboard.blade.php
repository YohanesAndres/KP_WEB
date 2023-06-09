<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    
    <!-- link data table -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


    <title>Document</title>
</head>
<body>
<div class="row d-flex justify-content-between">
    <div class="col-md-3">
        <aside class="sidebar">
            
            <div class="logo">
                    <img src = "{{ asset('images/LOGO.png') }}" alt="Logo">
                    <div class="bold-text" >Kas Uang Jalan</div>
                    <div>PT. Alam Wijaya Logistik</div>
            </div>
            <ul class="sidebar-menu" style="overflow-y: scroll">
                @if (Auth::check())
                    @if (Auth::user()->role === 'Administrator')
                        <li class="{{ Request::is('home2*') ? 'active' : '' }}">
                            <a href="{{ route('home2') }}">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                    @elseif (Auth::user()->role === 'boss')
                        <li class="{{ Request::is('home*') ? 'active' : '' }}">
                            <a href="{{ route('home') }}">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                    @endif
                @endif
                <li class="{{ Request::is('uang_jalan*') ? 'active' : '' }}">
                    <a href="{{ route('uang_jalan.index') }}">
                        <i class="fa fa-uang_jalan"></i> <span>Uang Jalan</span>
                    </a>
                </li>
                <li class="{{ Request::is('kas_uj*') ? 'active' : '' }}">
                    <a href="{{ route('kas_uj.index') }}">
                        <i class="fa fa-uang"></i> <span>Kas Uang Jalan</span>
                    </a>
                </li>
                <li class="{{ Request::is('update_mobil*') ? 'active' : '' }}">
                    <a href="{{ route('update_mobil.index') }}">
                        <i class="fa fa-update_mobil"></i> <span>Update Mobil</span>
                    </a>
                </li>
                <li class="{{ Request::is('data_tonase*') ? 'active' : '' }}">
                    <a href="{{ route('data_tonase.index') }}">
                        <i class="fa fa-database"></i> <span>Data Tonase</span>
                    </a>
                </li>
                <!-- <li class="{{ Request::is('rekap*') ? 'active' : '' }}">
                    <a href="{{ route('rekap.index') }}">
                        <i class="fa fa-rekap"></i> <span>Rekap Truk Kecil</span>
                    </a>
                </li> -->
                <li class="{{ Request::is('rekap_fuso*') ? 'active' : '' }}">
                    <a href="{{ route('rekap_fuso.index') }}">
                        <i class="fa fa-rekap_fuso"></i> <span>Rekap Truk</span>
                    </a>
                </li>
                <li class="{{ Request::is('hasil*') ? 'active' : '' }}">
                    <a href="{{ route('hasil.index') }}">
                        <i class="fa fa-hasil"></i> <span>Hasil</span>
                    </a>
                </li>
                <li class="{{ Request::is('namasopir*') ? 'active' : '' }}">
                    <a href="{{ route('namasopir.index') }}">
                        <i class="fa fa-namasopir"></i> <span>Daftar Sopir</span>
                    </a>
                </li>
                <li class="{{ Request::is('muat_bongkar*') ? 'active' : '' }}">
                    <a href="{{ route('muat_bongkar.index') }}">
                        <i class="fa fa-muat_bongkar"></i> <span>Muat Bongkar</span>
                    </a>
                </li>
                <li class="{{ Request::is('kendaraan*') ? 'active' : '' }}">
                    <a href="{{ route('kendaraan.index') }}">
                        <i class="fa fa-kendaraan"></i> <span>Kendaraan</span>
                    </a>
                </li>
                <!-- <li class="{{ Request::is('kategori*') ? 'active' : '' }}">
                    <a href="{{ route('kategori.index') }}">
                        <i class="fa fa-kategori"></i> <span>Kategori</span>
                    </a>
                </li>  -->
                <li class="{{ Request::is('tujuan*') ? 'active' : '' }}">
                    <a href="{{ route('tujuan.index') }}">
                        <i class="fa fa-tujuan"></i> <span>Tujuan</span>
                    </a>
                </li> 
                @can('viewAny', App\Models\User::class)
                <li class="{{ Request::is('user*') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}">
                        <i class="fa fa-user"></i> <span>Daftar Akun</span>
                    </a>
                </li> 
                @endcan

            </ul>
            <form method="POST" action="{{ route('logout') }}" class="text-logout">
                @csrf
                <button type="submit" class="btn-link">
                    <img src="{{ asset('Icon-LogOut.png') }}" alt="Logout" class="logout-icon">
                    <span class="logout-text">Logout</span>
                </button>
            </form>
        </aside>
    </div>
    <div class="body" style="padding-left: 40px">
            @yield('content')
    </div>
</div>
</body>
@yield('script')
</html>

<!-- script data tabel -->
<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>
