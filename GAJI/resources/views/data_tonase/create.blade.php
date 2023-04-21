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

<form action="{{ url('booking/store/') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="no_spk" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >no spk</label>
        <div class="col-sm-8">
        <input type="text" name="no_spk" id="no_spk" class="form-control" placeholder="Masukkan no_spk">
        </div>
    </div>
    @error('no_spk')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="no_do" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >no do</label>
        <div class="col-sm-8">
        <input type="text" name="no_do" id="no_do" class="form-control" placeholder="Masukkan no_do">
        </div>
    </div>
    @error('no_do')
    {{ $message }}
    @enderror <br>


    
   
    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9" >
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>
</form>
@endsection