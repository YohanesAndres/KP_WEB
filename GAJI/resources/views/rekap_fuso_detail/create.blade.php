@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <a href="/rekap_fuso"><img src="{{ asset('back.svg')}}" alt=""></a> 
  </div>
  <div >
    <div class="text-white text-center text-title">Form Tambah</div>
  </div>
</div>
<hr>

<div class="form-group row offset-sm-1 col-sm-5">
@if (session()->has('info'))
    {{ session()->get('info') }}
        
@endif
</div>
<br>
</br>

<div class="formmarg mt-4">
    <form action="{{ url('rekap_fusoDetail/store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="rekap_fuso_id" value="{{ $rekap_fuso_id }}">

        <div class="form-group row">
            <label for="id_uang_jalan" class="offset-sm-1 col-sm-3 col-form-label justify-content-center">Tanggal Muat</label>
            <div class="col-sm-9">
                <select name="id_uang_jalan" id="id_uang_jalan" class="form-control">
                    <option value="">Pilih Tanggal Muat</option>
                    @foreach ($update_mobil as $item)
                        @if($rekap_fuso->DataTonase->tujuan->tujuan == $item->uangjalan->muatbongkar->tujuan->tujuan)
                        <option value="{{ $item->id }}">{{ substr($item->uangjalan->tanggal,0,10) }} ({{$item->id}}#{{$item->uangjalan->muatbongkar->tujuan->tujuan}})</option>
                        @endif
                    @endforeach
                </select>
                @error('id_uang_jalan')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="tanggal_bongkar" class="offset-sm-1 col-sm-3 col-form-label justify-content-center" >Tanggal Bongkar</label>
            <div class="col-sm-9">
                <input type="text" name="tanggal_bongkar" id="tanggal_bongkar" class="form-control" placeholder="Tanggal Bongkar" readonly>
                @error('tanggal_bongkar')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="plat" class="offset-sm-1 col-sm-3 col-form-label justify-content-center">Plat</label>
            <div class="col-sm-9">
                <input type="text" name="plat" id="plat" class="form-control" placeholder="Plat" readonly>
                @error('plat')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="nama_sopir" class="offset-sm-1 col-sm-3 col-form-label justify-content-center">Nama Sopir</label>
            <div class="col-sm-9">
                <input type="text" name="nama_sopir" id="nama_sopir" class="form-control" placeholder="Nama Sopir" readonly>
                @error('nama_sopir')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <div class="form-group row">
            <label for="tonase" class="offset-sm-1 col-sm-3 col-form-label justify-content-center">Estimasi Tonase </label>
            <div class="col-sm-9">
                <input type="text" name="tonase" id="tonase" class="form-control" placeholder="Estimasi Tonase" readonly>
                @error('tonase')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="quantity_muat_pks_bruto" class="offset-sm-1 col-sm-3 col-form-label justify-content-center">BRUTO PKS</label>
            <div class="col-sm-9">
                <input type="number" name="quantity_muat_pks_bruto" id="quantity_muat_pks_bruto" class="form-control" placeholder="isi BRUTO PKS">
                @error('quantity_muat_pks_bruto')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="quantity_muat_pks_tarra" class="offset-sm-1 col-sm-3 col-form-label justify-content-center">TARRA PKS</label>
            <div class="col-sm-9">
                <input type="number" name="quantity_muat_pks_tarra" id="quantity_muat_pks_tarra" class="form-control" placeholder="isi TARRA PKS">
                @error('quantity_muat_pks_bruto')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="quantity_bongkar_bruto" class="offset-sm-1 col-sm-3 col-form-label justify-content-center">BRUTO BONGKAR</label>
            <div class="col-sm-9">
                <input type="number" name="quantity_bongkar_bruto" id="quantity_bongkar_bruto" class="form-control" placeholder="isi BRUTO BONGKAR">
                @error('quantity_muat_pks_bruto')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="quantity_bongkar_tarra" class="offset-sm-1 col-sm-3 col-form-label justify-content-center">TARRA BONGKAR</label>
            <div class="col-sm-9">
                <input type="number" name="quantity_bongkar_tarra" id="quantity_bongkar_tarra" class="form-control" placeholder="isi TARRA BONGKAR">
                @error('quantity_muat_pks_bruto')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="mutu_pks_ffa_alb" class="offset-sm-1 col-sm-3 col-form-label justify-content-center">MUTU PKS (FFA/ALB)</label>
            <div class="col-sm-9">
                <input type="number" step=0.01 name="mutu_pks_ffa_alb" id="mutu_pks_ffa_alb" class="form-control" placeholder="isi MUTU PKS (FFA/ALB)">
                @error('mutu_pks_ffa/alb')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="mutu_pks_ka" class="offset-sm-1 col-sm-3 col-form-label justify-content-center">MUTU PKS (KA)</label>
            <div class="col-sm-9">
                <input type="number" step=0.01 name="mutu_pks_ka" id="mutu_pks_ka" class="form-control" placeholder="isi MUTU PKS (KA)">
                @error('mutu_pks_ka')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="mutu_bongkar_ffa_alb" class="offset-sm-1 col-sm-3 col-form-label justify-content-center">MUTU BONGKAR (FFA/ALB)</label>
            <div class="col-sm-9">
                <input type="number" step=0.01 name="mutu_bongkar_ffa_alb" id="mutu_bongkar_ffa_alb" class="form-control" placeholder="isi MUTU BONGKAR (FFA/ALB)">
                @error('mutu_bongkar_ffa/alb')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="mutu_bongkar_ka" class="offset-sm-1 col-sm-3 col-form-label justify-content-center">MUTU BONGKAR (KA)</label>
            <div class="col-sm-9">
                <input type="number" step=0.01  name="mutu_bongkar_ka" id="mutu_bongkar_ka" class="form-control" placeholder="isi MUTU BONGKAR (KA)">
                @error('mutu_bongkar_ka')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="uang_jalan" class="offset-sm-1 col-sm-3 col-form-label justify-content-center">Uang Jalan </label>
            <div class="col-sm-9">
                <input type="text" name="uang_jalan" id="uang_jalan" class="form-control" placeholder="Estimasi Tonase" readonly>
                @error('uang_jalan')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
</div>

    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9" >
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>
</form>

@endsection
@section('script')
<script>

function renderinput() {
    
}

$(document).ready(function() {
    $('#id_uang_jalan').change(function() {
        var uang_jalanId = $(this).val();

        $.ajax({
            url: '/uang_jalan/get-dataJalan/' + uang_jalanId,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                //console.log(response);
                //alert(JSON.stringify(response));
                //dd(response);
                var muatBongkar = response.Datajalan.uangjalan.uang_Jalan;
                var kendaraan = response.Datajalan.uangjalan.kendaraan;
                var namaSopir = response.Datajalan.uangjalan.kendaraan.namasopir.nama_sopir;
                const tanggal = response.Datajalan.tanggal_bongkar;

                //console.log(namaSopir);
                console.log(response);

                $('#tanggal_bongkar').val(tanggal);
                $('#plat').val(kendaraan.plat);
                $('#tonase').val(kendaraan.tonase);
                $('#nama_sopir').val(namaSopir);
                $('#uang_jalan').val(muatBongkar);
            }
        });
    });
});




</script>

@endsection