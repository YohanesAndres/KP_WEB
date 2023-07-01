@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <a href="/uang_jalan"><img src="{{ asset('back.svg')}}" alt=""></a> 
  </div>
  <div >
    <div class="text-white text-center text-title"> Form Tambah Uang Jalan</div>
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
    <form action="{{ url('uang_jalan/store/') }}" method="POST" enctype="multipart/form-data" >
        @csrf

        
        <div class="form-group row">
            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
            <div class="col-sm-9">
                <input type="date" name="tanggal" id="tanggal" class="form-control" min="{{date('Y-m-d')}}">
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
                        <option value="{{ $item->id }}">{{ $item->plat }}</option>
                    @endforeach
                </select>
                @error('id_kendaraan')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="nomorUJ" class="col-sm-3 col-form-label">ID Uang Jalan</label>
            <div class="col-sm-9">
                <input type="text" name="nomorUJ" id="nomorUJ" class="form-control" placeholder="ID Uang Jalan" readonly>
                @error('nomorUJ')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
            <div class="col-sm-9">
                <input type="text" name="kategori" id="kategori" class="form-control" placeholder="Kategori" readonly>
                @error('id_kendaraan')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- <div class="form-group row">
            <label for="barcode" class="col-sm-3 col-form-label">Barcode</label>
            <div class="col-sm-9">
                <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Masukkan barcode">
                @error('barcode')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div> -->

        <div class="form-group row">
            <label for="id_muat_bongkar" class="col-sm-3 col-form-label">Muat Bongkar</label>
            <div class="col-sm-9">
                <select name="id_muat_bongkar" id="id_muat_bongkar" class="form-control">
                    <option value="">Pilih Muat Bongkar</option>
                    @foreach ($tablemuatbongkarData as $item)
                        <option value="{{ $item->id }}">{{ $item->muatBongkar }}</option>
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
                <input type="text" name="tujuan" id="tujuan" class="form-control" placeholder="Masukkan Tujuan" readonly>
                @error('id_muat_bongkar')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="uang_Jalan" class="col-sm-3 col-form-label">Uang Jalan</label>
            <div class="col-sm-9">
                <input type="text" name="uang_Jalan" id="uang_Jalan" class="form-control" placeholder="Masukkan Uang Jalan" readonly>
                @error('id_muat_bongkar')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="tanggal_bongkar" class="col-sm-3 col-form-label">Tanggal Bongkar</label>
            <div class="col-sm-9">
                <input type="text" name="tanggal_bongkar" id="tanggal_bongkar" class="form-control" placeholder="Tanggal Bongkar" readonly>
                @error('id_muat_bongkar')
                <span class="text-danger">{{ $message }}</span>
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
                    //console.log(response);
                    //alert(JSON.stringify(response));
                    //dd(response);
                    $('#kategori').val(response.kategori);
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
                    //console.log(response);
                    //alert(JSON.stringify(response));
                    //dd(response);
                    $('#uang_Jalan').val(response.UangJalan.uang_jalan);
                    $('#tujuan').val(response.UangJalan.id_tujuan);
                }
            });
        });

        // $('#id_muat_bongkar').change(function() {
        //     var muatbongkarId = $(this).val();

        //     // Menggunakan AJAX untuk mengambil data kategori kendaraan
        //     $.ajax({
        //         url: '/muat_bongkar/get-tujuan/' + muatbongkarId,
        //         type: 'GET',
        //         dataType: 'json',
        //         success: function(response) {
        //             // console.log(response);
        //             // alert(JSON.stringify(response));
        //             // dd(response);
        //             $('#tujuan').val(response.Tujuan.id_tujuan);
        //         }
        //     });
        // });
    });

    function validateIDUJLength(input) {
        if (input.value.length > 6) {
            input.value = input.value.slice(0, 6); // Menghapus karakter setelah 16 digit
        }
    }

    function generateUniqueID() {
        var tanggalElement = document.getElementById('tanggal');
        var tanggal = formatDate(tanggalElement.value);
        var platElement = document.getElementById('id_kendaraan');
        var plat = platElement.options[platElement.selectedIndex].text;
        var muatBongkarElement = document.getElementById('id_muat_bongkar');
        var muatBongkarId = muatBongkarElement.value;

        if (tanggal && plat) {
            // Mengambil 2 huruf paling belakang dari plat kendaraan
            var platCode = plat.substr(plat.length - 2);

            // Menggabungkan tanggal dan platCode menjadi nomorUJ
            var nomorUJ = tanggal + platCode + muatBongkarId;

            // Mengisi nilai nomorUJ pada input field
            document.getElementById('nomorUJ').value = nomorUJ;
        } else {
            // Kosongkan nilai nomorUJ jika tanggal atau plat kendaraan tidak diisi
            document.getElementById('nomorUJ').value = '';
        }
    }

    function formatDate(date) {
    if (date.length === 10) {
        var year = date.substring(8);
        var month = date.substring(5, 7);
        var day = date.substring(0, 4);

        return year  + month + day;
    }

    return '';
    }

    // Memanggil generateUniqueID setiap kali tanggal atau plat kendaraan berubah
    document.getElementById('tanggal').addEventListener('change', generateUniqueID);
    document.getElementById('id_kendaraan').addEventListener('change', generateUniqueID);
    document.getElementById('id_muat_bongkar').addEventListener('change', generateUniqueID);

</script>

@endsection