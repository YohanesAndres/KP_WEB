@extends('layout.dashboard')
@section('content')

<h2>Edit Kendaraan</h2>
@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
<form action="{{ url('kendaraan/update/'.$kendaraan->id) }}" method="POST">
    @csrf
    @method('patch')


    Plat <br>
    <input type="text" name="plat" id="plat" value="{{$kendaraan->plat}}">
    @error('plat')
    {{ $message }}
    @enderror <br>

    Tonase <br>
    <input type="text" name="tonase" id="tonase" value="{{$kendaraan->tonase}}">
    @error('tonase')
    {{ $message }}
    @enderror <br>

    Nama Sopir <br>
    <select name="id_namasopir" id="id_namasopir" class="form-control">
        @foreach ($tablenamasopirData as $item)
            <option value="{{ $item->id }}" {{ $item->id == $kendaraan->id_namasopir ? 'selected' : '' }}>
                {{ $item->nama_sopir }}
            </option>
        @endforeach
    </select>
    @error('id_namasopir')
    {{ $message }}
    @enderror <br>

    Kategori <br>
    <select name="id_kategori" id="id_kategori" class="form-control">
        @foreach ($tablekategoriData as $item)
            <option value="{{ $item->id }}" {{ $item->id == $kendaraan->id_kategori ? 'selected' : '' }}>
                {{ $item->nama }}
            </option>
        @endforeach
    </select>
    @error('id_kategori')
    {{ $message }}
    @enderror <br>
   
    <input type="submit" value="Simpan Data">
</form>
@endsection