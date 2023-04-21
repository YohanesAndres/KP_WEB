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

<form action="{{ url('uang_jalan/store/') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="tanggal" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Tanggal</label>
        <div class="col-sm-8">
        <input type="date" name="tanggal" id="tanggal" class="form-control">
        </div>
    </div>
    @error('tanggal')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="id_kendaraan" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >id_kendaraan</label>
        <div class="col-sm-8">
        <input type="text" name="id_kendaraan" id="id_kendaraan" class="form-control" placeholder="Masukkan id_kendaraan">
        </div>
    </div>
    @error('id_kendaraan')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="barcode" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >barcode</label>
        <div class="col-sm-8">
        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Masukkan barcode">
        </div>
    </div>
    @error('barcode')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="id_muat_bongkar" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >id_muat_bongkar</label>
        <div class="col-sm-8">
        <input type="text" name="id_muat_bongkar" id="id_muat_bongkar" class="form-control" placeholder="Masukkan id_muat_bongkar">
        </div>
    </div>
    @error('id_muat_bongkar')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="jumlah_uang_jalan" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >jumlah_uang_jalan</label>
        <div class="col-sm-8">
        <input type="text" name="jumlah_uang_jalan" id="jumlah_uang_jalan" class="form-control" placeholder="Masukkan jumlah_uang_jalan">
        </div>
    </div>
    @error('jumlah_uang_jalan')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="cek" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >cek</label>
        <div class="col-sm-8">
        <input type="text" name="cek" id="cek" class="form-control" placeholder="Masukkan cek">
        </div>
    </div>
    @error('cek')
    {{ $message }}
    @enderror <br>


   
   
    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9" >
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>
</form>
@endsection