@extends('layout.dashboard')
@section('content')

<h2>Edit Kategori</h2>
@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
<form action="{{ url('kategori/update/'.$kategori->id) }}" method="POST">
    @csrf
    @method('patch')


    Nama <br>
    <input type="text" name="nama" id="nama" value="{{$kategori->id_kategori}}">
    @error('nama')
    {{ $message }}
    @enderror <br>
   
    <input type="submit" value="Simpan Data">
</form>
@endsection