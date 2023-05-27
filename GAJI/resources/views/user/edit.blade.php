@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/form.css') }}" rel="stylesheet">
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<a href="/user"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-center">Form Edit Akun</h1>

<br>
</br>

<div class="form-group row offset-sm-1 col-sm-2">
    @if (session()->has('info'))
            {{ session()->get('info') }}
    @endif
</div>

<br>
</br>

<form action="{{ url('/user/update/'.$user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="form-group row">
        <label for="name" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Nama</label>
        <div class="col-sm-8">
            <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama Akun">
        </div>
    </div>
    @error('name')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="email" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Email</label>
        <div class="col-sm-8">
            <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan Nama Akun">
        </div>
    </div>
    @error('email')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="password" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Password</label>
        <div class="col-sm-8">
            <input type="text" name="password" id="password" class="form-control" placeholder="Masukkan Nama Akun">
        </div>
    </div>
    @error('password')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9" >
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>
</form>
@endsection