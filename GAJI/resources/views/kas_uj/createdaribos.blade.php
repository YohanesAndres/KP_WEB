@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <a href="/kas_uj"><img src="{{ asset('back.svg')}}" alt=""></a> 
  </div>
  <div >
    <div class="text-white text-center text-title"> Form Tambah Kas Uang Jalan Bos</div>
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
    <form action="{{ url('kas_uj/store_daribos/') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="tanggal" class="offset-sm-1 col-sm-3 col-form-label justify-content-center" >Tanggal</label>
        <div class="col-sm-9">
            <input type="date" name="tanggal" id="tanggal" class="form-control" min="{{date('Y-m-d')}}">
            @error('tanggal')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

        <div class="form-group row">
            <label for="expenses" class="offset-sm-1 col-sm-3 col-form-label justify-content-center" >Expenses</label>
            <div class="col-sm-9">
                <select name="expenses" id="expenses" class="form-control">
                        <option value="Kas Uang Jalan">Kas Uang Jalan</option>
                </select> 
                @error('expenses')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="jumlah_uang" class="offset-sm-1 col-sm-3 col-form-label justify-content-center" >Jumlah Uang</label>
            <div class="col-sm-9">
                <input type="number" name="jumlah_uang" id="jumlah_uang" class="form-control" placeholder="Masukkan Jumlah Uang">
                @error('jumlah_uang')
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