@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <a href="/kendaraan"><img src="{{ asset('back.svg')}}" alt=""></a> 
  </div>
  <div >
    <div class="text-white text-center text-title">Form Tambah Kendaraan</div>
  </div>
</div>
<hr>


<div class="form-group row offset-sm-1 col-sm-2">
    @if (session()->has('info'))
            {{ session()->get('info') }}
    @endif
</div>

<br></br>

<div class=formmarg>
    <form action="{{ url('kendaraan/store/') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label for="plat" class="col-sm-3 col-form-label">Plat</label>
            <div class="col-sm-9">
                <input type="text" name="plat" id="plat" class="form-control" placeholder="Masukkan No plat " >
                @error('plat')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="tonase" class="col-sm-3 col-form-label">Tonase</label>
            <div class="col-sm-9">
                <input type="text" name="tonase" id="tonase" class="form-control" placeholder="Masukkan Tonase" >
                @error('tonase')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="id_namasopir" class="col-sm-3 col-form-label">Nama Sopir</label>
            <div class="col-sm-9">
                <select name="id_namasopir" id="id_namasopir" class="form-control">
                    <option value="">Pilih Nama Sopir</option>
                    @foreach ($tablenamasopirData as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_sopir }}</option>
                    @endforeach
                </select>
                @error('id_namasopir')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="id_kategori" class="col-sm-3 col-form-label">Kategori</label>
            <div class="col-sm-9">
                <select name="id_kategori" id="id_kategori" class="form-control">
                    <option value="">Pilih Kategori</option>
                    @foreach ($tablekategoriData as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
                @error('id_kategori')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
</div>

    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9" >
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>
</form>
@endsection