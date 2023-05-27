@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <a href="/kategori"><img src="{{ asset('back.svg')}}" alt=""></a> 
  </div>
  <div >
    <div class="text-white text-center text-title">Form Edit Kategori</div>
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
  <form action="{{ url('kategori/update/'.$kategori->id) }}" method="POST">
      @csrf
      @method('patch')

      <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Kategori</label>
          <div class="col-sm-9">
              <input type="text" name="nama" id="nama" class="form-control" value="{{$kategori->nama}}" >
              @error('nama')
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