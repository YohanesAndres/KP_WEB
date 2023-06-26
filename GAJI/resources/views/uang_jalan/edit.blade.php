@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <a href="/uang_jalan"><img src="{{ asset('back.svg')}}" alt=""></a> 
  </div>
  <div >
    <div class="text-white text-center text-title"> Form Edit Uang Jalan</div>
  </div>
</div>
<hr>

<div class="form-group row offset-sm-1 col-sm-4">

@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
</div>
<br>
</br>

<div class=formmarg>
    <form action="{{ url('uang_jalan/update/'.$uang_jalan->id) }}" method="POST">
    @csrf
    @method('patch')

        <div class="form-group row">
            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
            <div class="col-sm-9">
                <input type="text" name="tanggal" id="tanggal" class="form-control " value="{{ old('tanggal', date('Y-m-d',strtotime ($uang_jalan->tanggal))) }}" readonly>
                @error('tanggal')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="id_kendaraan" class="col-sm-3 col-form-label">Plat</label>
            <div class="col-sm-9">
                <select name="id_kendaraan" id="id_kendaraan" class="form-control">
                    <option value="">Pilih Plat</option>
                    @foreach ($tablekendaraanData as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $uang_jalan->id_kendaraan ? 'selected' : '' }}>{{ $item->plat }}</option>
                    @endforeach
                </select>
                @error('id_kendaraan')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                <div class="col-sm-9">
                    <input type="text" name="kategori" id="kategori" class="form-control" value="{{ old('kategori', $uang_jalan->kendaraan->kategori) }}" readonly>
                    @error('id_kendaraan')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        </div>

        <!-- <div class="form-group row">
            <label for="barcode" class="col-sm-3 col-form-label">Barcode</label>
            <div class="col-sm-9">
                <input type="text" name="barcode" id="barcode" class="form-control" value="{{$uang_jalan->barcode}}">
                @error('barcode')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div> -->

        <div class="form-group row">
            <label for="id_muat_bongkar" class="col-sm-3 col-form-label">Muat Bongkar</label>
            <div class="col-sm-9">
                <select name="id_muat_bongkar" id="id_muat_bongkar" class="form-control">
                    <option value="">Pilih Tujuan</option>
                    @foreach ($tablemuatbongkarData as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $uang_jalan->id_muat_bongkar ? 'selected' : '' }}>{{ $item->muatBongkar }}</option>
                    @endforeach
                </select>
                @error('id_muat_bongkar')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="tujuan" class="col-sm-3 col-form-label">Tujuan</label>
            <div class="col-sm-9">
                <input type="text" name="tujuan" id="tujuan" class="form-control" value="{{ old('tujuan', $uang_jalan->muatBongkar->tujuan->tujuan) }}" readonly>
                @error('tujuan')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="uang_Jalan" class="col-sm-3 col-form-label">Uang Jalan</label>
            <div class="col-sm-9">
                <input type="text" name="uang_Jalan" id="uang_Jalan" class="form-control" value="{{ old('uang_jalan', $uang_jalan->uang_Jalan) }}" readonly>
                @error('uang_Jalan')
                <span class="text-danger">{{ $uang_Jalan }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
            <div class="col-sm-9">
                <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan Keterangan">
                @error('keterangan')
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
                    console.log(response);
                    // alert(JSON.stringify(response));
                    // dd(response);
                    $('#uang_Jalan').val(response.UangJalan.uang_jalan);
                    $('#tujuan').val(response.UangJalan.id_tujuan);
                }
            });
        });

        // $('#id_muat_bongkar').change(function() {
        //     var muatbongkarId = $(this).val();

        //     // Menggunakan AJAX untuk mengambil data kategori muat bongkar
        //     $.ajax({
        //         url: '/muat_bongkar/get-tujuan/' + muatbongkarId,
        //         type: 'GET',
        //         dataType: 'json',
        //         success: function(response) {
        //             console.log(response)
        //             $('#tujuan').val(response.Tujuan.tujuan);
        //         }
        //     });
        // });
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