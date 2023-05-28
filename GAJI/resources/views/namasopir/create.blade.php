@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <a href="/namasopir"><img src="{{ asset('back.svg')}}" alt=""></a> 
  </div>
  <div >
    <div class="text-white text-center text-title">Form Tambah Daftar Sopir</div>
  </div>
</div>
<hr>


<div class="form-group row offset-sm-1 col-sm-4">
    @if (session()->has('info'))
            {{ session()->get('info') }}
    @endif
</div>

<br>
</br>

<div class=formmarg>
  <form action="{{ url('/namasopir/store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group row">
            <label for="nama_sopir" class="col-sm-3 col-form-label">Nama Sopir</label>
            <div class="col-sm-9">
                <input type="text" name="nama_sopir" id="nama_sopir" class="form-control" placeholder="Masukkan Nama Sopir">
                @error('nama_sopir')
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