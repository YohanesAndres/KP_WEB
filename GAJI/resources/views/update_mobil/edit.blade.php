@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <a href="/update_mobil"><img src="{{ asset('back.svg')}}" alt=""></a> 
  </div>
  <div >
    <div class="text-white text-center text-title">Form Edit Update Mobil</div>
  </div>
</div>
<hr>

<div class="form-group row offset-sm-1 col-sm-2">
@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
</div>
<br>
</br>

<div class=formmarg>
    <form action="{{ url('update_mobil/update/'.$update_mobil->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">Status</label>
            <div class="col-sm-9">
                <select name="status" id="status" class="form-control">
                    <option value="sedang dijalan" {{ 'sedang dijalan' == $update_mobil->status ? 'selected' : '' }}>Sedang dijalan</option>
                    <option value="selesai" {{ 'selesai' == $update_mobil->status ? 'selected' : '' }}>Selesai</option>
                    <option value="accident" {{ 'accident' == $update_mobil->status ? 'selected' : '' }}>Accident</option>
                </select>   
                @error('jumlah_uang_jalan')
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