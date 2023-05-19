@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/form.css') }}" rel="stylesheet">
<div class="top-title">
<a href="/rekap_fuso"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-center">Form Tambah</h1>
</div>
<br>
</br>
<div class="form-group row offset-sm-1 col-sm-2">
@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
</div>
<br>
</br>

<form action="{{ url('rekap_fuso/store/') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="alamat" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Alamat</label>
        <div class="col-sm-8">
        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat">
        </div>
    </div>
    @error('alamat')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="muat_cpo" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Muat CPO</label>
        <div class="col-sm-8">
        <input type="text" name="muat_cpo" id="muat_cpo" class="form-control" placeholder="Masukkan Muat CPO">
        </div>
    </div>
    @error('muat_cpo')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="tujuan_bongkar" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Tujuan Bongkar</label>
        <div class="col-sm-8">
        <input type="text" name="tujuan_bongkar" id="tujuan_bongkar" class="form-control" placeholder="Masukkan Tujuan">
        </div>
    </div>
    @error('tujuan_bongkar')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="no_spk_tanggal" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >No SPK Tanggal</label>
        <div class="col-sm-8">
        <input type="text" name="no_spk_tanggal" id="no_spk_tanggal" class="form-control" placeholder="Masukkan No SPK">
        </div>
    </div>
    @error('no_spk_tanggal')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="no_kontrak_tanggal" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >No Kontrak Tanggal</label>
        <div class="col-sm-8">
        <input type="text" name="no_kontrak_tanggal" id="no_kontrak_tanggal" class="form-control" placeholder="Masukkan No Kontrak">
        </div>
    </div>
    @error('no_kontrak_tanggal')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="no_tanggal_do_besar" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >No DO Besar</label>
        <div class="col-sm-8">
        <input type="text" name="no_tanggal_do_besar" id="no_tanggal_do_besar" class="form-control" placeholder="Masukkan NO DO Besar">
        </div>
    </div>
    @error('no_tanggal_do_besar')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="quantity_do_ton" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Quantity DO</label>
        <div class="col-sm-8">
        <input type="text" name="quantity_do_ton" id="quantity_do_ton" class="form-control" placeholder="Masukkan Quantity DO">
        </div>
    </div>
    @error('quantity_do_ton')
    {{ $message }}
    @enderror <br>


    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9" >
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>
</form>
@endsection