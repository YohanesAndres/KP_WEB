@extends('layout.dashboard')
@section('content')
<a href="/namasopir"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-white text-center">Form Edit Daftar Sopir</h1>

@if (session()->has('info'))
        {{ session()->get('info') }}
@endif

<form action="{{ url('namasopir/update/'.$namasopir->id) }}" method="POST">
    @csrf
    @method('patch')
    nama_sopir <br>
    <input type="text" name="nama_sopir" id="nama_sopir" value="{{$namasopir->nama_sopir}}">
    @error('nama_sopir')
    {{ $message }}
    @enderror <br>
   
    <input type="submit" value="Simpan Data">
</form>
@endsection