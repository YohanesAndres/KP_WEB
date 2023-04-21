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

<form action="{{ url('update_mobil/store/') }}" method="POST" enctype="multipart/form-data">
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
        <label for="status" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >status</label>
        <div class="col-sm-8">
        <input type="text" name="status" id="status" class="form-control" placeholder="Masukkan status">
        </div>
    </div>
    @error('status')
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
        <label for="keterangan" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >keterangan</label>
        <div class="col-sm-8">
        <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan keterangan">
        </div>
    </div>
    @error('keterangan')
    {{ $message }}
    @enderror <br>
   
    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9" >
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>
</form>
@endsection