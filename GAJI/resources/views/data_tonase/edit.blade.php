@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <a href="/data_tonase"><img src="{{ asset('back.svg')}}" alt=""></a> 
  </div>
  <div >
    <div class="text-white text-center text-title">Form Edit Data Tonase</div>
  </div>
</div>
<hr>

<div class="form-group row offset-sm-1 col-sm-4">
    @if (session()->has('info'))
        {{ session()->get('info') }}
    @endif
</div>

<br></br>

<div class=formmarg>
    <form action="{{ url('data_tonase/update/'.$data_tonase->id) }}" method="POST">
        @csrf
        @method('patch')

        <div class="form-group row">
            <label for="no_spk" class="col-sm-3 col-form-label">NO SPK</label>
            <div class="col-sm-9">
                <input type="text" name="no_spk" id="no_spk" class="form-control" value="{{$data_tonase->no_spk}}">
                @error('no_spk')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="no_do" class="col-sm-3 col-form-label">NO DO</label>
            <div class="col-sm-9">
                <input type="text" name="no_do" id="no_do" class="form-control" value="{{$data_tonase->no_do}}">
                @error('no_do')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="tonase_actual" class="col-sm-3 col-form-label">Tonase Aktual</label>
            <div class="col-sm-9">
                <input type="number" name="tonase_actual" id="tonase_actual" class="form-control" value="{{$data_tonase->tonase_actual}}">
                @error('tonase_actual')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="id_tujuan" class="col-sm-3 col-form-label">Tujuan</label>
            <div class="col-sm-9">
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
   
    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9" >
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>
</form>
@endsection