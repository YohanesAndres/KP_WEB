@extends('layout.dashboard')
@section('content')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<a href="/namasopir"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-white text-center">Form Tambah Daftar Sopir</h1>
<br>
</br>
<div class="form-group row offset-sm-1 col-sm-2">
@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
</div>
<br>
</br>

<form action="{{ url('/namasopir/store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="nama_sopir" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Nama Sopir</label>
        <div class="col-sm-8">
        <input type="text" name="nama_sopir" id="nama_sopir" class="form-control" placeholder="Masukkan nama_sopir">
        </div>
    </div>
    @error('nama_sopir')
    {{ $message }}
    @enderror <br>

   
   
    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9" >
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>
</form>
@endsection