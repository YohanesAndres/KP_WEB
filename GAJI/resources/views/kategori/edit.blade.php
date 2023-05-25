@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/form.css') }}" rel="stylesheet">
<a href="/kategori"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-center">Form Edit Kategori</h1>

<br></br>

<div class="form-group row offset-sm-1 col-sm-2">
    @if (session()->has('info'))
            {{ session()->get('info') }}
    @endif
</div>

<br></br>

<form action="{{ url('kategori/update/'.$kategori->id) }}" method="POST">
    @csrf
    @method('patch')

    <div class="form-group row">
        <label for="nama" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Kategori</label>
        <div class="col-sm-8">
            <input type="text" name="nama" id="nama" value="{{$kategori->nama}}"placeholder="Edit Nama Kategori">
        </div>
    </div>
    @error('nama')
    {{ $message }}
    @enderror <br>
   
    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9" >
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>
</form>
@endsection