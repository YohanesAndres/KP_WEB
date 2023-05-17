@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/form.css') }}" rel="stylesheet">
<a href="/data_tonase"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-center">Form Tambah Data Tonase</h1>

<br>
</br>
<div class="form-group row offset-sm-1 col-sm-2">
@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
</div>
<br>
</br>

<form action="{{ url('data_tonase/store/') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="no_spk" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >NO SPK</label>
        <div class="col-sm-8">
        <input type="text" name="no_spk" id="no_spk" class="form-control" placeholder="Masukkan NO SPK">
        </div>
    </div>
    @error('no_spk')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="no_do" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >NO DO</label>
        <div class="col-sm-8">
        <input type="text" name="no_do" id="no_do" class="form-control" placeholder="Masukkan NO DO">
        </div>
    </div>
    @error('no_do')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="tonase_actual" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Tonase Aktual</label>
        <div class="col-sm-8">
        <input type="text" name="tonase_actual" id="tonase_actual" class="form-control" placeholder="Masukkan Tonase Aktual">
        </div>
    </div>
    @error('tonase_actual')
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
        <div class="offset-sm-3 col-sm-9" >
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>
</form>
@endsection