@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <a href="/user"><img src="{{ asset('back.svg')}}" alt=""></a> 
  </div>
  <div>
    <div class="text-white text-center text-title"> Form Tambah Akun</div>
  </div>
</div>
<hr>

<div class="form-group row offset-sm-1 col-sm-4">
    @if (session()->has('info'))
        {{ session()->get('info') }}
    @endif
</div>

<br></br>

<div class="formmarg">
    <form action="{{ url('/user/store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
                <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama Akun">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan Email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
                <div class="password-wrapper">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password">
                    <span class="password-toggle" onclick="togglePasswordVisibility()">&#128065;</span>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="role" class="col-sm-3 col-form-label">Role</label>
            <div class="col-sm-9">
                <select name="role" id="role" class="form-control">
                    <option>Administrator</option>
                    <option>Sopir</option>
                </select>   
                @error('role')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9" >
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </div>
    </form>
</div>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var togglePassword = document.querySelector(".password-toggle");
        
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            togglePassword.innerHTML = "&#128065;"; // Tampilkan mata terbuka
        } else {
            passwordInput.type = "password";
            togglePassword.innerHTML = "&#128064;"; // Tampilkan mata tertutup
        }
    }
</script>

@endsection
