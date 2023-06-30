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
    <style>
        .profile-image {
            display: flex;
            justify-content: center;
        }
        .profile-info {
            margin-left: 30px;
            margin-bottom: 20px;
        }
        .logout-container {
            display: flex;
            margin-top: 50px;

        }
        .text-logout {
            margin-top: 10px;
        }
        .reminder {
            margin-left: 20px;
            font-size: 13px;
            color: red;
        }
    </style>
</head>
<body>
<div class="row d-flex justify-content-between">
    <div class="col-md-3">
        <aside class="sidebar">
            <div class="logo">
                <img src="{{ asset('images/LOGO.png') }}" alt="Logo">
                <div class="bold-text">Kas Uang Jalan</div>
                <div>PT. Alam Wijaya Logistik</div>
            </div>
            <div class="user-profile">
                <div class="profile-image">
                    <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto Sopir" width="130" height="150">
                </div>
                <hr>
                <div class="profile-info">
                    <h4>Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ Auth::user()->name }}</h4>
                    <!-- <h4>ID Sopir&nbsp;&nbsp;: {{ Auth::user()->idSopir }}</h4> -->
                    <p>Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ Auth::user()->alamat }}</p>
                    <p>Nomor NIK&nbsp;: {{ Auth::user()->NIK }}</p>
                </div>
                <p class="reminder">Apabila ada data yang salah, harap lapor ke admin !</p>
            </div>
            <div class="logout-container">
                <form method="POST" action="{{ route('logout') }}" class="text-logout">
                    @csrf
                    <button type="submit" class="btn-link">
                        <img src="{{ asset('Icon-LogOut.png') }}" alt="Logout" class="logout-icon">
                        <span class="logout-text">Logout</span>
                    </button>
                </form>
            </div>
        </aside>
    </div>
    <div class="body" style="padding-left: 40px">
        @yield('content')
    </div>
</div>
</body>
@yield('script')
</html>

<!-- script data table -->
<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>