@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/form.css') }}" rel="stylesheet">
<a href="/kendaraan"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-center">Form Edit Kendaraan</h1>

<br></br>
<div class="form-group row offset-sm-1 col-sm-2">
@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
</div>
<br>
</br>

<form action="{{ url('kendaraan/update/'.$kendaraan->id) }}" method="POST">
    @csrf
    @method('patch')


    <div class="form-group row">
        <label for="plat" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Plat</label>
        <div class="col-sm-8">
        <input type="text" name="plat" id="plat" value="{{$kendaraan->plat}}">
        </div>
    </div>
    @error('plat')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="tonase" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Tonase</label>
        <div class="col-sm-8">
        <input type="text" name="tonase" id="tonase" value="{{$kendaraan->tonase}}">
        </div>
    </div>
    @error('tonase')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="id_namasopir" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Nama Sopir</label>
        <div class="col-sm-8">
            <select name="id_namasopir" id="id_namasopir" class="form-control">
                @foreach ($tablenamasopirData as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $kendaraan->id_namasopir ? 'selected' : '' }}>
                        {{ $item->nama_sopir }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    @error('id_namasopir')
    {{ $message }}
    @enderror <br>

    <div class="form-group row">
        <label for="id_kategori" class="offset-sm-1 col-sm-2 col-form-label justify-content-center" >Kategori</label>
        <div class="col-sm-8">
            <select name="id_kategori" id="id_kategori" class="form-control">
                @foreach ($tablekategoriData as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $kendaraan->id_kategori ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    @error('id_kategori')
    {{ $message }}
    @enderror <br>
   
    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9" >
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>
</form>
@endsection