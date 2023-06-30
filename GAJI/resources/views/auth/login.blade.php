<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link href="{{ asset('/css/login.css') }}" rel="stylesheet">
    <!--agar pengguna tidak bisa masuk lagi setelah log out -->
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login-container">
                    <div class="logo">
                        <img src="logo.png" alt="">
                        <div class="bold-text" >Kas Uang Jalan</div>
                        <div>PT. Alam Wijaya Logistik</div>
                    </div>
                    
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" style="margin-top:35px">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Masukkan Email"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan Password"/>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="form-check mb-3">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label for="remember_me" class="form-check-label">Remember me</label>
                        </div>
                        <br></br>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js">
        
        // // Hapus cache
        // window.onunload = function () {};

        // // Pengalihan halaman setelah logout
        // setTimeout(function () {
        //     location.replace('/login');
        // }, 0);
        // Menghapus riwayat kembali saat halaman dimuat
        
    </script>
    <script>
        window.onload = function() {
            if (window.history && window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        };
    </script>
</body>
</html>


