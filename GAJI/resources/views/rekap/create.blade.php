@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/form.css') }}" rel="stylesheet">
<div class="top-title">
<a href="/rekap"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-center">Form Tambah</h1>
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

<form action="{{ url('rekap/store/') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="pks" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >PKS</label>
        <div class="col-sm-8">
        <input type="text" name="pks" id="pks" class="form-control" placeholder="Masukkan PKS">
        </div>
    </div>
    @error('pks')
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
        <label for="kontrak_no" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Kontrak No</label>
        <div class="col-sm-8">
        <input type="text" name="kontrak_no" id="kontrak_no" class="form-control" placeholder="Masukkan Tonase Aktual">
        </div>
    </div>
    @error('kontrak_no')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="bongkar" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Bongkar</label>
        <div class="col-sm-8">
        <input type="text" name="bongkar" id="bongkar" class="form-control" placeholder="Masukkan Tonase Aktual">
        </div>
    </div>
    @error('bongkar')
    {{ $message }}
    @enderror <br>


    
   
    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9" >
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>
</form>
@endsection