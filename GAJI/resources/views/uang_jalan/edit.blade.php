@extends('layout.dashboard')
@section('content')

<a href="/uang_jalan"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-white text-center">Form Edit Uang Jalan</h1>

@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
<form action="{{ url('uang_jalan/update/'.$uang_jalan->id) }}" method="POST">
    @csrf
    @method('patch')


    Tanggal <br>
        <input type="text" name="tanggal" id="tanggal" class="form-control datepicker" value="{{ old('tanggal', $uang_jalan->tanggal) }}">
    @error('tanggal')
    {{ $message }}
    @enderror <br>

    Plat <br>
    <select name="id_kendaraan" id="id_kendaraan" class="form-control">
        <option value="">Pilih Plat</option>
        @foreach ($tablekendaraanData as $item)
            <option value="{{ $item->id }}" {{ $item->id == $uang_jalan->id_kendaraan ? 'selected' : '' }}>{{ $item->plat }}</option>
        @endforeach
    </select>
    @error('id_kendaraan')
    {{ $message }}
    @enderror <br>
    
    Kategori <br>
        <input type="text" name="kategori" id="kategori" value="{{ old('kategori', $uang_jalan->kendaraan->kategori->nama) }}" readonly>
    @error('kategori')
    {{ $message }}
    @enderror <br>

    Barcode <br>
    <input type="text" name="barcode" id="barcode" value="{{$uang_jalan->barcode}}">
    @error('id_muat_bongkar')
    {{ $message }}
    @enderror <br>

    Tujuan <br>
    <select name="id_muat_bongkar" id="id_muat_bongkar" class="form-control">
        <option value="">Pilih Tujuan</option>
        @foreach ($tablemuatbongkarData as $item)
            <option value="{{ $item->id }}" {{ $item->id == $uang_jalan->id_muat_bongkar ? 'selected' : '' }}>{{ $item->muatBongkar }}</option>
        @endforeach
    </select>
    @error('jumlah_uang_jalan')
    {{ $message }}
    @enderror <br>

    Uang Jalan <br>
        <input type="text" name="uang_Jalan" id="uang_Jalan" value="{{$uang_jalan->uang_Jalan }}" readonly>
    @error('cek')
    {{ $message }}
    @enderror <br>

    Keterangan <br>
        <input type="text" name="keterangan" id="keterangan" value="{{$uang_jalan->keterangan}}">
    @error('cek')
    {{ $message }}
    @enderror <br>
   
    <input type="submit" value="Simpan Data">
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
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
    });
</script>
@endsection