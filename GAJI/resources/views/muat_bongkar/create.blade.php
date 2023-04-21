@extends('layout.dashboard')
@section('content')
<h1 class="text-black text-center">Tambah Booking</h1>
<br>
</br>
<div class="form-group row offset-sm-1 col-sm-2">
@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
</div>
<br>
</br>

<form action="{{ url('muat_bongkar/store/') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="uang_jalan" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >uang_jalan</label>
        <div class="col-sm-8">
        <input type="text" name="uang_jalan" id="uang_jalan" class="form-control" placeholder="Masukkan uang_jalan">
        </div>
    </div>
    @error('uang_jalan')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="muatBongkar" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >muatBongkar</label>
        <div class="col-sm-8">
        <input type="text" name="muatBongkar" id="muatBongkar" class="form-control" placeholder="Masukkan muatBongkar">
        </div>
    </div>
    @error('muatBongkar')
    {{ $message }}
    @enderror <br>

   
    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9" >
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>
</form>
@endsection