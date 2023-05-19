@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/form.css') }}" rel="stylesheet">
<a href="/muat_bongkar"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-center">Form Edit Muat Bongkar</h1>
<br>
</br>
<div class="form-group row offset-sm-1 col-sm-2">

@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
</div>
<br>
</br>

<form action="{{ url('muat_bongkar/update/'.$muat_bongkar->id) }}" method="POST">
    @csrf
    @method('patch')


    <div class="form-group row">
        <label for="muatBongkar" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Muat Bongkar</label>
        <div class="col-sm-8">
            <input type="text" name="muatBongkar" id="muatBongkar" value="{{$muat_bongkar->muatBongkar}}">
        </div>
    </div>
    @error('muatBongkar')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="tujuan" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Tujuan</label>
        <div class="col-sm-8">
            <input type="text" name="tujuan" id="tujuan" value="{{$muat_bongkar->tujuan}}">
        </div>
    </div>
    @error('tujuan')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="uang_jalan" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Uang Jalan</label>
        <div class="col-sm-8">
        <input type="text" name="uang_jalan" id="uang_jalan" value="{{$muat_bongkar->uang_jalan}}">
        </div>
    </div>
    @error('uang_jalan')
    {{ $message }}
    @enderror <br>

   
    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9" >
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>
</form>
@endsection