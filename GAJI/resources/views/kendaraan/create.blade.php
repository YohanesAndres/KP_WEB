@extends('layout.dashboard')
@section('content')
<h1 class="text-black text-center">Tambah Booking</h1>
<br>
</br>
<div class="form-group row offset-sm-1 col-sm-2">
@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
</div>
<br>
</br>

<form action="{{ url('kendaraan/store/') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="plat" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >plat</label>
        <div class="col-sm-8">
        <input type="text" name="plat" id="plat" class="form-control" placeholder="Masukkan plat">
        </div>
    </div>
    @error('plat')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="tonase" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >tonase</label>
        <div class="col-sm-8">
        <input type="text" name="tonase" id="tonase" class="form-control" placeholder="Masukkan tonase">
        </div>
    </div>
    @error('tonase')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="id_namasopir" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >id_namasopir</label>
        <div class="col-sm-8">
        <input type="text" name="id_namasopir" id="id_namasopir" class="form-control" placeholder="Masukkan id_namasopir">
        </div>
    </div>
    @error('id_namasopir')
    {{ $message }}
    @enderror <br>
   

    <div class="form-group row">
        <label for="id_kategori" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >id_kategori</label>
        <div class="col-sm-8">
        <input type="text" name="id_kategori" id="id_kategori" class="form-control" placeholder="Masukkan id_kategori">
        </div>
    </div>
    @error('id_kategori')
    {{ $message }}
    @enderror <br>

   
   
    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9" >
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>
</form>
@endsection