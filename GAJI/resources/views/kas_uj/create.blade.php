@extends('layout.dashboard')
@section('content')
<div class="top-title">
<a href="/kas_uj"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-white text-center">Form Rekap PerTanggal Uang Jalan</h1>
</div>
<br>
</br>
<div class="form-group row offset-sm-1 col-sm-2">
@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
</div>
<br>
</br>

<form action="{{ url('kas_uj/store/') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="tanggal" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Tanggal</label>
        <div class="col-sm-8">
        <input type="date" name="tanggal" id="tanggal" class="form-control" min="{{date('Y-m-d')}}">
        </div>
    </div>
    @error('tanggal')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="expenses" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >expenses</label>
        <div class="col-sm-8">
        <select name="expenses" id="expenses" class="form-control">
                <option value="Uang Jalan Per Tanggal">Uang Jalan Per Tanggal</option>
        </select>   
        </div>
    </div>
    @error('expenses')
    {{ $message }}
    @enderror <br>


    <!-- <div class="form-group row">
        <label for="jumlah_uang" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >jumlah uang</label>
        <div class="col-sm-8">
        <input type="text" name="jumlah_uang" id="jumlah_uang" class="form-control" placeholder="Masukkan jumlah_uang">
        </div>
    </div>
    @error('jumlah_uang')
    {{ $message }}
    @enderror <br> -->


    <!-- <div class="form-group row">
        <label for="dari_bos" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >dari_bos</label>
        <div class="col-sm-8">
        <input type="checkbox" name="dari_bos" id="dari_bos" class="form-control" placeholder="Masukkan dari_bos">
        </div>
    </div>
    @error('dari_bos')
    {{ $message }}
    @enderror <br> -->

   
    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9" >
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>
</form>
@endsection