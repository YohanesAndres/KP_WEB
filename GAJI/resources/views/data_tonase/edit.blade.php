@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/form.css') }}" rel="stylesheet">
<div class="top-title">
    <a href="/data_tonase"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-center"> Form Edit Data Tonase</h1>
</div>

<br></br>

<div class="form-group row offset-sm-1 col-sm-2">
    @if (session()->has('info'))
        {{ session()->get('info') }}
    @endif
</div>

<br></br>

<form action="{{ url('data_tonase/update/'.$data_tonase->id) }}" method="POST">
    @csrf
    @method('patch')

    <div class="form-group row">
        <label for="no_spk" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Nomor SPK</label>
        <div class="col-sm-8">
            <input type="text" name="no_spk" id="no_spk" value="{{$data_tonase->no_spk}}">
        </div>
    </div>
    @error('no_spk')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="no_do" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Nomor DO</label>
        <div class="col-sm-8">
            <input type="text" name="no_do" id="no_do" value="{{$data_tonase->no_do}}">
        </div>
    </div>
    @error('no_do')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="tonase_actual" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Tonase Aktual</label>
        <div class="col-sm-8">
            <input type="text" name="tonase_actual" id="tonase_actual" value="{{$data_tonase->tonase_actual}}">
        </div>
    </div>
    @error('tonase_actual')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="id_tujuan" class="offset-sm-1 col-sm-2 col-form-label justify-content-center">Tujuan</label>
        <div class="col-sm-8">
            <select name="id_tujuan" id="id_tujuan" class="form-control">
                <option value="">Pilih Tujuan</option>
                @foreach ($tujuanData as $item)
                <option value="{{ $item->id }}" {{ $item->id == $data_tonase->id_tujuan ? 'selected' : '' }}>{{ $item->tujuan }}</option>
                @endforeach
            </select>
            @error('id_tujuan')
            <span class="text-danger">{{ $message }}</span>
            @enderror
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