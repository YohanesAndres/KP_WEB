@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/form.css') }}" rel="stylesheet">
<a href="/rekap_fuso"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-center">Form Edit Rekap</h1>

<br>
</br>
<div class="form-group row offset-sm-1 col-sm-2">

@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
</div>
<br>
</br>

<form action="{{ url('rekap_fuso/update/'.$rekap_fuso->id) }}" method="POST">
    @csrf
    @method('patch')

    <div class="form-group row">
        <label for="alamat" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Alamat</label>
        <div class="col-sm-8">
        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" value="{{$rekap_fuso->alamat}}">
        </div>
    </div>
    @error('alamat')
    {{ $message }}
    @enderror

    <div class="form-group row">
        <label for="id_dataTonase" class="offset-sm-1 col-sm-2 col-form-label justify-content-center">NO DO</label>
        <div class="col-sm-8">
            <select name="id_dataTonase" id="id_dataTonase" class="form-control">
                <option value="">Pilih Nomor DO</option>
                @foreach ($tableDatatonase as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $rekap_fuso->id_dataTonase ? 'selected' : '' }}>{{ $item->no_do }}</option>
                @endforeach
            </select>
            @error('id_kendaraan')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="no_spk" class="offset-sm-1 col-sm-2 col-form-label justify-content-center">NO SPK</label>
        <div class="col-sm-8">
            <input type="text" name="no_spk" id="no_spk" class="form-control" value="{{ old('no_spk', $rekap_fuso->dataTonase->no_spk) }}" readonly>
            @error('id_dataTonase')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="tujuan" class="offset-sm-1 col-sm-2 col-form-label justify-content-center">Tujuan</label>
        <div class="col-sm-8">
            <input type="text" name="tujuan" id="tujuan" class="form-control" value="{{ old('tujuan', $rekap_fuso->dataTonase->tujuan->tujuan) }}" readonly>
            @error('id_dataTonase')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="no_kontrak" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >NO Kontrak</label>
        <div class="col-sm-8">
        <input type="text" name="no_kontrak" id="no_kontrak" class="form-control" placeholder="Masukkan No Kontrak" value="{{$rekap_fuso->no_kontrak}}">
        </div>
    </div>
    @error('no_kontrak')
    {{ $message }}
    @enderror

    <div class="form-group row">
        <label for="tonase_actual" class="offset-sm-1 col-sm-2 col-form-label justify-content-center">Quantity Do (Ton)</label>
        <div class="col-sm-8">
            <input type="text" name="tonase_actual" id="tonase_actual" class="form-control" value="{{ old('tonase_actual', $rekap_fuso->dataTonase->tonase_actual) }}" readonly>
            @error('id_dataTonase')
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
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#id_dataTonase').change(function() {
            var dataTonaseId = $(this).val();

            $.ajax({
                url: '/data_tonase/get-tonase/' + dataTonaseId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    //console.log(response);
                    //alert(JSON.stringify(response));
                    //dd(response);
                    $('#no_spk').val(response.Tonase.no_spk);
                    $('#tujuan').val(response.Tonase.id_tujuan);
                    $('#tonase_actual').val(response.Tonase.tonase_actual);
                }
            });
        });
    });

</script>
@endsection