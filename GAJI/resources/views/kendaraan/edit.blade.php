@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <a href="/kendaraan"><img src="{{ asset('back.svg')}}" alt=""></a> 
  </div>
  <div >
    <div class="text-white text-center text-title">Form Edit Kendaraan</div>
  </div>
</div>
<hr>


<div class="form-group row offset-sm-1 col-sm-4">
    @if (session()->has('info'))
            {{ session()->get('info') }}
    @endif
</div>

<br></br>

<div class=formmarg>
    <form action="{{ url('kendaraan/update/'.$kendaraan->id) }}" method="POST">
        @csrf
        @method('patch')

        <div class="form-group row">
            <label for="plat" class="col-sm-3 col-form-label">plat</label>
            <div class="col-sm-9">
                <input type="text" name="plat" id="plat" class="form-control" value="{{$kendaraan->plat}}" >
                @error('plat')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="tonase" class="col-sm-3 col-form-label">Tonase</label>
            <div class="col-sm-9">
                <input type="number" name="tonase" id="tonase" class="form-control" value="{{$kendaraan->tonase}}" >
                @error('tonase')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="id_namasopir" class="col-sm-3 col-form-label">Nama Sopir</label>
            <div class="col-sm-9">
            <select name="id_namasopir" id="id_namasopir" class="form-control">
                @foreach ($tableUserData as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $kendaraan->id_namasopir ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
                @error('id_namasopir')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
            <div class="col-sm-9">
                <input type="text" name="kategori" id="kategori" class="form-control" value="{{$kendaraan->kategori}}" placeholder="Masukkan Kategori" >
                @error('kategori')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9" >
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </div>
    </form>
</div>
@endsection