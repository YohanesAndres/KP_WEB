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
        <label for="id_kendaraan" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Plat</label>
        <div class="col-sm-8">
            <select name="id_kendaraan" id="id_kendaraan" class="form-control">
                <option value="">Pilih Plat</option>
                @foreach ($tablekendaraanData as $item)
                    <option value="{{ $item->id }}">{{ $item->plat }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @error('id_kendaraan')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="kategori" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Kategori</label>
        <div class="col-sm-8">
            <input type="text" name="kategori" id="kategori" class="form-control" placeholder="Kategori" readonly>
        </div>
    </div>
    @error('id_kendaraan')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="barcode" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Barcode</label>
        <div class="col-sm-8">
        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Masukkan barcode">
        </div>
    </div>
    @error('barcode')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="id_muat_bongkar" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Tujuan</label>
        <div class="col-sm-8">
            <select name="id_muat_bongkar" id="id_muat_bongkar" class="form-control">
                <option value="">Pilih Tujuan</option>
                @foreach ($tablemuatbongkarData as $item)
                    <option value="{{ $item->id }}">{{ $item->muatBongkar }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @error('id_muat_bongkar')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="uang_jalan" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Uang Jalan</label>
        <div class="col-sm-8">
            <input type="text" name="uang_jalan" id="uang_jalan" class="form-control" placeholder="Masukkan Uang Jalan" readonly>
        </div>
    </div>
    @error('id_muat_bongkar')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="keterangan" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Keterangan</label>
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
@section('script')
<script>
    $(document).ready(function() {
        $('#id_kendaraan').change(function() {
            var kendaraanId = $(this).val();

            // Menggunakan AJAX untuk mengambil data kategori kendaraan
            $.ajax({
                url: '/kendaraan/get-kategori/' + kendaraanId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#kategori').val(response.kategori.nama);
                }
            });
        });

        $('#id_muat_bongkar').change(function() {
            var muatbongkarId = $(this).val();

            // Menggunakan AJAX untuk mengambil data kategori muat bongkar
            $.ajax({
                url: '/muat_bongkar/get-uang_jalan/' + muatbongkarId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(response.UangJalan.uang_jalan);
                    $('#uang_jalan').val(response.UangJalan.uang_jalan);
                }
            });
        });
    });
    
</script>

@endsection